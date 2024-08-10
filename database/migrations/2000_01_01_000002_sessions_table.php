<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Auth\Models\Session;

#endregion

return new class extends Migration
{
    #region MIGRATIONS

    /**
     * @return void
     */
    public function up(): void
    {
        $this->createSessionsTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(Session::TABLE);
    }

    #endregion

    #region TABLES

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

    #endregion
};
