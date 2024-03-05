<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->text('notes')->nullable();
            $table->string('address');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('settlement_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('status')->default(1);
            $table->boolean('payed')->default(false);
            $table->boolean('ended')->default(false);
            $table->string('order_number', 12)->unique();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');


        });

        // DB::unprepared('
        //     CREATE TRIGGER trg_generate_order_number
        //     BEFORE INSERT ON orders
        //     FOR EACH ROW
        //     BEGIN
        //         DECLARE generated_string CHAR(12);
        //         SET generated_string = CONCAT(LPAD(NEW.id, 6, "0"), SUBSTRING(MD5(RAND()) FROM 1 FOR 6));
        //         SET NEW.order_number = generated_string;
        //     END;
        // ');

        DB::unprepared('
            CREATE TRIGGER trg_generate_order_number
            BEFORE INSERT ON orders
            FOR EACH ROW
            BEGIN
                DECLARE generated_string CHAR(12);
                SET generated_string = CONCAT(
                    LPAD(NEW.id, 6, "0"), 
                    CHAR(FLOOR(65 + RAND() * 26)),
                    CHAR(FLOOR(65 + RAND() * 26)),
                    CHAR(FLOOR(65 + RAND() * 26)),
                    CHAR(FLOOR(65 + RAND() * 26)),
                    CHAR(FLOOR(65 + RAND() * 26)),
                    CHAR(FLOOR(65 + RAND() * 26))
                );
                SET NEW.order_number = generated_string;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
