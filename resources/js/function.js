$(document).ready(function () {
  var columnCount = 0;

  // Fungsi untuk menambahkan baris kolom baru
  function addColumnRow() {
    var columnRow = `
            <div class="column-row mb-3 flex items-center gap-3">
                <input type="text" name="columns[${columnCount}][name]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Nama kolom">
                <select name="columns[${columnCount}][type]" class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                    <option value="string">String</option>
                    <option value="integer">Integer</option>
                    <option value="float">Float</option>
                    <option value="boolean">Boolean</option>
                    <option value="date">Date</option>
                </select>
                <button type="button" class="btn btn-circle btn-danger remove-column">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        `;

    $("#columns-container").append(columnRow);
    columnCount++;
  }

  // Tambahkan event listener untuk tombol "Tambah Kolom"
  $(document).on("click", ".add-column", function () {
    addColumnRow();
  });

  // Tambahkan event listener untuk tombol "Hapus"
  $(document).on("click", ".remove-column", function () {
    $(this).closest(".column-row").remove();
  });
});
