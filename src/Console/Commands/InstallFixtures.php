<?php

namespace Tinspj\Fixtures\Console\Commands;

use Illuminate\Console\Command;
use DB;

class InstallFixtures extends Command
{
    protected $signature = 'fixtures:loaddata {file}';

    protected $description = 'Upload json data to table';

    public function handle()
    {
        try {
            $file = $this->argument('file');
            $contents = file_get_contents(storage_path('app/fixtures/' . $file));
            $array = json_decode($contents);
            $object = [];
            foreach ($array->data as $row) {
                $sub_object = [];
                foreach ($row as $key => $column) {
                    $sub_object[$key] = $column;
                }
                array_push($object, $sub_object);
            }
            DB::transaction(function () use ($array, $object) {
                DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
                DB::table($array->table)->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
                DB::table($array->table)->insert($object);
            }, 5);
            $this->info('data inserted');
        } catch (\Throwable $e) {
            $this->error($e->getMessage());

        }

    }

}
