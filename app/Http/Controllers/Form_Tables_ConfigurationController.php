<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str; // Import kelas Str

class Form_Tables_ConfigurationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedData = $request->validate([
            'table_name' => 'required|string|max:255',
            'columns' => 'required|array',
            'columns.*.name' => 'required|string|max:255',
            'columns.*.type' => 'required|string|in:string,integer,float,boolean,date',
        ]);

        // Simpan nama tabel baru ke dalam database
        $tableName = $validatedData['table_name'];

        // Buat migrasi baru
        $migrationName = 'create_' . strtolower(str_replace(' ', '_', $tableName)) . '_table';
        Artisan::call('make:migration', [
            'name' => $migrationName,
            '--create' => $tableName,
        ]);

        // Buat model baru
        $modelName = ucfirst(Str::camel(str_replace(' ', '_', $tableName))); // Menggunakan Str::camel()
        Artisan::call('make:model', [
            'name' => $modelName,
        ]);

        // Simpan data kolom ke dalam database
        $columns = $validatedData['columns'];
        // Disimpan dalam format yang sesuai dengan kebutuhan migrasi
        $columnsData = '';
        foreach ($columns as $column) {
            $columnName = $column['name'];
            $columnType = $column['type'];
            $columnsData .= "\$table->$columnType('$columnName');";
        }
        // Menulis data kolom ke dalam migrasi
        $migrationPath = database_path('migrations');
        $migrationFiles = scandir($migrationPath);
        $latestMigration = $migrationFiles[count($migrationFiles) - 1];
        $migrationContent = file_get_contents($migrationPath . '/' . $latestMigration);
        $migrationContent = str_replace('$table->id();', '$table->id();' . PHP_EOL . $columnsData, $migrationContent);
        file_put_contents($migrationPath . '/' . $latestMigration, $migrationContent);

        // Redirect ke halaman yang sesuai setelah berhasil
        return redirect()->route('form_tables_configuration.index');
    }
}
