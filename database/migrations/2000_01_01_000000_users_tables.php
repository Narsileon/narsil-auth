<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Auth\Models\User;
use Narsil\Auth\Models\UserHasFavorite;

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
        $this->createUserHasFavoriteTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(UserHasFavorite::TABLE);
        Schema::dropIfExists(User::TABLE);
    }

    #endregion

    #region TABLES

    /**
     * @return void
     */
    private function createUserHasFavoriteTable(): void
    {
        if (Schema::hasTable(UserHasFavorite::TABLE))
        {
            return;
        }

        Schema::create(UserHasFavorite::TABLE, function (Blueprint $table)
        {
            $table
                ->id(UserHasFavorite::ID);
            $table
                ->foreignId(UserHasFavorite::USER_ID)
                ->constrained(User::TABLE, User::ID)
                ->cascadeOnDelete();
            $table
                ->morphs(UserHasFavorite::RELATIONSHIP_MODEL);
            $table
                ->timestamps();

            $table->unique([
                UserHasFavorite::USER_ID,
                UserHasFavorite::MODEL_TYPE,
                UserHasFavorite::MODEL_ID,
            ]);
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
                ->boolean(User::ACTIVE)
                ->default(true);
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
                ->icon(User::AVATAR);
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
