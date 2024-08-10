<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Auth\Models\LoginLog;
use Narsil\Auth\Models\Session;
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
        $this->createUsersTable();
        $this->createSessionsTable();
        $this->createLoginLogsTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(LoginLog::TABLE);
        Schema::dropIfExists(Session::TABLE);
        Schema::dropIfExists(User::TABLE);
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

    /**
     * @return void
     */
    private function createSessionsTable(): void
    {
        if (Schema::hasTable(Session::TABLE))
        {
            return;
        }

        Schema::create(Session::TABLE, function (Blueprint $table)
        {
            $table
                ->string(Session::ID)
                ->primary();
            $table
                ->foreignId(Session::USER_ID)
                ->nullable()
                ->index();
            $table
                ->string(Session::IP_ADDRESS, 45)
                ->nullable();
            $table
                ->text(Session::USER_AGENT)
                ->nullable();
            $table
                ->longText(Session::PAYLOAD);
            $table
                ->integer(Session::LAST_ACTIVITY)
                ->index();
        });
    }

    /**
     * @return void
     */
    private function createUsersTable(): void
    {
        if (Schema::hasTable(User::TABLE))
        {
            return;
        }

        Schema::create(User::TABLE, function (Blueprint $table)
        {
            $table
                ->id(User::ID);
            $table
                ->string(User::USERNAME)
                ->unique();
            $table
                ->string(User::EMAIL)
                ->unique();
            $table
                ->timestamp(User::EMAIL_VERIFIED_AT)
                ->nullable();
            $table
                ->string(User::PASSWORD);
            $table
                ->string(User::LAST_NAME);
            $table
                ->string(User::FIRST_NAME);
            $table
                ->datetime(User::BIRTHDATE)
                ->nullable();
            $table
                ->string(User::BIRTHPLACE)
                ->nullable();
            $table
                ->string(User::BIRTH_COUNTRY)
                ->nullable();
            $table
                ->rememberToken();
            $table
                ->timestamps();
        });
    }

    #endregion
};
