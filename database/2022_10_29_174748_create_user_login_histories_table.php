<?php

use \Xt\LoginHistory\Models\UserLoginHistory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ip_address', 20);
            $table->string('user_agent')->nullable();
            $table->string('region', 200)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('lat', 50)->nullable();
            $table->string('lng', 50)->nullable();
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop($this->table());
    }

    private function table(): string
    {
        return (new UserLoginHistory())->getTable();
    }
};
