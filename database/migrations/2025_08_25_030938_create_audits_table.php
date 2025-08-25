<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('audits')) {
            Schema::create('audits', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('member_id');
                $table->string('action');
                $table->string('collection_name');
                $table->string('document_id');
                $table->json('document_values');
                $table->string('from_where')->nullable();
            });
        } else {
            echo "Table 'audits' already exists. Skipping creation." . PHP_EOL;
        }

//        Schema::collection('your_collection_name', function (Blueprint $collection) {
//            $collection->command('collMod', [
//                'validator' => [
//                    '$jsonSchema' => [
//                        'bsonType' => 'object',
//                        'required' => ['member_id', 'action', 'collection_name', 'document_id', 'document_values'],
//                        'properties' => [
//                            'member_id' => [
//                                'bsonType' => 'string',
//                                'description' => 'must be a string and is required'
//                            ],
//                            'action' => [
//                                'bsonType' => 'string',
//                                'description' => 'must be a string and is required'
//                            ],
//                            'collection_name' => [
//                                'bsonType' => 'string',
//                                'description' => 'must be a string and is required'
//                            ],
//                            'document_id' => [
//                                'bsonType' => 'string',
//                                'description' => 'must be a string and is required'
//                            ],
//                            'document_values' => [
//                                'bsonType' => 'object',
//                                'description' => 'must be an object and is required'
//                            ],
//                            'from_where' => [
//                                'bsonType' => ['string', 'null'],
//                                'description' => 'can be a string or null'
//                            ]
//                        ]
//                    ]
//                ],
//                'validationLevel' => 'moderate',
//                'validationAction' => 'warn'
//            ]);
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
