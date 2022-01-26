<!-- membuat form dinamis pada fitur transaksi -->
<script>
    $(document).ready(function(){
        $('#dinamis .add-row').click(function () {
            var template = '<tr><td><input class="form-control" type="text" name="jenis_pakaian[]"></td><td><input class="form-control" type="text" name="jumlah_pakaian[]"></td><td><button type="button" class="btn btn-danger delete-row">-</button></td></tr>';
            $('#dinamis tbody').append(template);
        });

        $('#dinamis').on('click', '.delete-row', function () {
            $(this).parent().parent().remove();
        });
    });
</script>

<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</h4>
            </div>

            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Javascript untuk popup modal Delete-->
<script>
    function confirm_modal(delete_url)
    {
        $('#modal_delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script>
    $(document).ready(function(){
        $('#table-datatable').DataTable();
    });
</script>
</body>
</html>
