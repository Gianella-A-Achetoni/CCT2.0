<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('teacher_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
        });

        if (! Schema::hasColumn('courses', 'profesor')) {
            return;
        }

        $courses = DB::table('courses')
            ->select(['id', 'profesor'])
            ->whereNotNull('profesor')
            ->get();

        foreach ($courses as $course) {
            $teacherName = trim((string) $course->profesor);

            if ($teacherName === '') {
                continue;
            }

            $teacherId = DB::table('users')
                ->where('name', $teacherName)
                ->value('id');

            if (! $teacherId) {
                $slug = Str::slug($teacherName, '.');
                $slug = $slug !== '' ? $slug : 'teacher';
                $email = $slug.'@cct.local';
                $counter = 1;

                while (DB::table('users')->where('email', $email)->exists()) {
                    $email = $slug.'+'.$counter.'@cct.local';
                    $counter++;
                }

                $teacherId = DB::table('users')->insertGetId([
                    'name' => $teacherName,
                    'email' => $email,
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('courses')
                ->where('id', $course->id)
                ->update(['teacher_id' => $teacherId]);
        }

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('profesor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('profesor')->nullable()->after('nombre');
        });

        $courses = DB::table('courses')
            ->leftJoin('users', 'users.id', '=', 'courses.teacher_id')
            ->select(['courses.id as course_id', 'users.name as teacher_name'])
            ->get();

        foreach ($courses as $course) {
            DB::table('courses')
                ->where('id', $course->course_id)
                ->update(['profesor' => $course->teacher_name ?? '']);
        }

        Schema::table('courses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('teacher_id');
        });
    }
};
