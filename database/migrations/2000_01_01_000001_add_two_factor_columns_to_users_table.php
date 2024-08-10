<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;
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
        $this->addTwoFactorSecret();
        $this->addTwoFactorRecoveryCodes();

        if (Fortify::confirmsTwoFactorAuthentication())
        {
            $this->addTwoFactorConfirmedAt();
        }
    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->removeTwoFactorColumns();
    }

    #endregion

    #region COLUMNS

    /**
     * @return void
     */
    private function addTwoFactorSecret(): void
    {
        if (Schema::hasColumns(User::TABLE, [
            User::TWO_FACTOR_SECRET
        ]))
        {
            return;
        }

        Schema::table(User::TABLE, function (Blueprint $table)
        {
            $table
                ->text(User::TWO_FACTOR_SECRET)
                ->after(User::PASSWORD)
                ->nullable();
        });
    }

    /**
     * @return void
     */
    private function addTwoFactorRecoveryCodes(): void
    {
        if (Schema::hasColumns(User::TABLE, [
            User::TWO_FACTOR_RECOVERY_CODES
        ]))
        {
            return;
        }

        Schema::table(User::TABLE, function (Blueprint $table)
        {
            $table
                ->text(User::TWO_FACTOR_RECOVERY_CODES)
                ->after(User::TWO_FACTOR_SECRET)
                ->nullable();
        });
    }

    /**
     * @return void
     */
    private function addTwoFactorConfirmedAt(): void
    {
        if (Schema::hasColumns(User::TABLE, [
            User::TWO_FACTOR_CONFIRMED_AT
        ]))
        {
            return;
        }

        Schema::table(User::TABLE, function (Blueprint $table)
        {
            $table
                ->timestamp(User::TWO_FACTOR_CONFIRMED_AT)
                ->after(User::TWO_FACTOR_RECOVERY_CODES)
                ->nullable();
        });
    }

    /**
     * @return void
     */
    private function removeTwoFactorColumns(): void
    {
        Schema::table(User::TABLE, function (Blueprint $table)
        {
            $table->dropColumn(array_merge([
                User::TWO_FACTOR_RECOVERY_CODES,
                User::TWO_FACTOR_SECRET,
            ], Fortify::confirmsTwoFactorAuthentication() ? [
                User::TWO_FACTOR_CONFIRMED_AT,
            ] : []));
        });
    }

    #endregion
};
