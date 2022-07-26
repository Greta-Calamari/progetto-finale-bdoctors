<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body" id="deleteModal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="button" class="btn btn-primary" onclick="doctors.submitForm()">Si cancella</button>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-content{
        border: 1px solid #E3342F !important
    }
    .modal-header {
        border-bottom: 1px solid #E3342F !important;
    }
    .modal-footer{
        border-top: 1px solid #E3342F !important;
    }
    .btn-primary{
        background-color: #E3342F !important;
        border-color: #E3342F !important;
    }
    .btn-primary:hover{
        background-color: red !important;
    }
    .btn-secondary{
        background-color: #5F4BB6 !important;
        border-color: #5F4BB6 !important;
    }
    .btn-secondary:hover{
        background-color: #745cde !important;
    }
</style>