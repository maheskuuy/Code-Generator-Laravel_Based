<script>
    document.addEventListener('DOMContentLoaded', function() {
        let columnsContainer = document.getElementById('columns-container');
        let addColumnButton = document.querySelector('.add-column');

        addColumnButton.addEventListener('click', function() {
            let newColumnRow = document.createElement('div');
            newColumnRow.classList.add('column-row', 'mb-3', 'flex', 'items-center', 'gap-3');

            let columnNameInput = document.createElement('input');
            columnNameInput.setAttribute('type', 'text');
            columnNameInput.setAttribute('name', 'columns[][name]');
            columnNameInput.classList.add('form-input', 'border-slate-200', 'dark:border-zink-500', 'focus:outline-none', 'focus:border-custom-500', 'disabled:bg-slate-100', 'dark:disabled:bg-zink-600', 'disabled:border-slate-300', 'dark:disabled:border-zink-500', 'dark:disabled:text-zink-200', 'disabled:text-slate-500', 'dark:text-zink-100', 'dark:bg-zink-700', 'dark:focus:border-custom-800', 'placeholder:text-slate-400', 'dark:placeholder:text-zink-200');
            columnNameInput.setAttribute('placeholder', 'Nama kolom');

            let columnTypeSelect = document.createElement('select');
            columnTypeSelect.setAttribute('name', 'columns[][type]');
            columnTypeSelect.classList.add('form-select', 'border-slate-200', 'dark:border-zink-500', 'focus:outline-none', 'focus:border-custom-500', 'disabled:bg-slate-100', 'dark:disabled:bg-zink-600', 'disabled:border-slate-300', 'dark:disabled:border-zink-500', 'dark:disabled:text-zink-200', 'disabled:text-slate-500', 'dark:text-zink-100', 'dark:bg-zink-700', 'dark:focus:border-custom-800', 'placeholder:text-slate-400', 'dark:placeholder:text-zink-200');

            let types = ['String', 'Integer', 'Float', 'Boolean', 'Date'];
            types.forEach(function(type) {
                let option = document.createElement('option');
                option.setAttribute('value', type.toLowerCase());
                option.textContent = type;
                columnTypeSelect.appendChild(option);
            });

            let addColumnButton = document.createElement('button');
            addColumnButton.setAttribute('type', 'button');
            addColumnButton.classList.add('btn', 'btn-circle', 'btn-primary', 'add-column');
            addColumnButton.innerHTML = '<i class="absolute"></i>';

            newColumnRow.appendChild(columnNameInput);
            newColumnRow.appendChild(columnTypeSelect);
            newColumnRow.appendChild(addColumnButton);

            columnsContainer.appendChild(newColumnRow);
        });
    });
</script>

<div class="col-span-12 card 2xl:col-span-12">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
            <div class="2xl:col-span-3">
                <h6 class="text-15">Form CRUD Generator</h6>
            </div><!--end col-->
        </div><!--end grid-->
        <div class="flex flex-col items-center mt-5 md:flex-row">
            <div class="mb-0 w-screen lg:w-full card shadow-lg border-none shadow-slate-100 relative">
                <div class="!px-10 !py-12 card-body">
                    <form action="{{ route('register') }}" class="mt-10" method="POST">
                        @csrf
                        <div class="">
                            <div class="mb-3">
                                <label for="table-name" class="inline-block mb-2 text-base font-medium">Nama Menu</label>
                                <input type="text" name="table_name" id="table-name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Masukkan Nama Menu">
                            </div>
                            <div class="mb-3">
                                <label for="table-name" class="inline-block mb-2 text-base font-medium">Nama Submenu</label>
                                <input type="text" name="table_name" id="table-name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Masukkan Nama Submenu">
                            </div>
                            <div class="mb-3">
                                <label for="table-name" class="inline-block mb-2 text-base font-medium">Pilih Tabel</label>
                                <input type="text" name="table_name" id="table-name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Pilih Nama Tabel">
                            </div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="w-full text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Buat Tabel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div><!--end col-->