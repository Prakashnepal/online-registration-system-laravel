$table->unsignedBigInteger('status_id')->default('1');
$table->foreign('status_id')
->references('id')
->on('statuses')
->onDelete('cascade');