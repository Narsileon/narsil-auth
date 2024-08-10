<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Auth\Models\PersonalAccessToken;

#endregion

return new class extends Migration
{
    #region MIGRATIONS

    /**
     * @return void
     */
    public function up(): void
    {
        $this->createPersonalAccessTokensTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(PersonalAccessToken::TABLE);
    }

    #endregion

    #region TABLES

    /**
     * @return void
     */
    private function createPersonalAccessTokensTable(): void
    {
        if (Schema::hasTable(PersonalAccessToken::TABLE))
        {
            return;
        }

        Schema::create(PersonalAccessToken::TABLE, function (Blueprint $table)
        {
            $table
                ->id(PersonalAccessToken::ID);
            $table
                ->morphs(PersonalAccessToken::RELATIONSHIP_TOKENABLE);
            $table
                ->string(PersonalAccessToken::NAME);
            $table
                ->string(PersonalAccessToken::TOKEN, 64)
                ->unique();
            $table
                ->text(PersonalAccessToken::ABILITIES)
                ->nullable();
            $table
                ->timestamp(PersonalAccessToken::LAST_USED_AT)
                ->nullable();
            $table
                ->timestamp(PersonalAccessToken::EXPIRES_AT)
                ->nullable();
            $table
                ->timestamps();
        });
    }

    #endregion
};
