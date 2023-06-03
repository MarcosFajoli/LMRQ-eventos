<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $datenow = Carbon::now();

        DB::table('modalities')->insert([
            [
                'id' => 1,
                'description' => 'Deluxe',
                'value' => 200,
                'created_at' => $datenow,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'description' => 'Premium',
                'value' => 150,
                'created_at' => $datenow,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'description' => 'Padrão',
                'value' => 100,
                'created_at' => $datenow,
                'updated_at' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('modalities')->whereIn('id', [1, 2, 3])->delete();
    }
};
