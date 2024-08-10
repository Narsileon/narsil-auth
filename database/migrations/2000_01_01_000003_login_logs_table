<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Auth\Models\LoginLog;
use Narsil\Auth\Models\User;

#endregion

return new class extends Migration
{
    #region MIGRATIONS

    /**
     * @return void
     */
    public function up(): void
    {
        $this->createLoginLogsTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(LoginLog::TABLE);
    }

    #endregion

    #region TABLES

    /**
     * @return void
     */
    private function createLoginLogsTable(): void
    {
        if (Schema::hasTable(LoginLog::TABLE))
        {
            return;
        }

        Schema::create(LoginLog::TABLE, function (Blueprint $table)
        {
            $table
                ->id(LoginLog::ID);
            $table
                ->foreignId(LoginLog::USER_ID)
                ->nullable()
                ->constrained(User::TABLE, User::ID)
                ->nullOnDelete();
            $table
                ->json(LoginLog::IP_ADDRESSES)
                ->nullable();
            $table
                ->string(LoginLog::SESSION_ID)
                ->nullable();
            $table
                ->string(LoginLog::DEVICE)
                ->nullable();
            $table
                ->timestamps();
        });
    }

    #endregion
};
