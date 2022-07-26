require('./bootstrap');
// import './mychart.js';

window.doctors = {
    currentForm: null,
    // itemid: null,
    openModal(e){
        e.preventDefault();
        //console.log(id);
        // this.itemid = id;
        //console.log(e.currentTarget);
        this.currentForm = e.currentTarget.parentNode;
        // console.log(this.currentForm); 
        $('#deleteModal-body').html(`<h4>Sei sicuro di voler eliminare questo profilo?</h4>`);
        $('#deleteModal').modal('show');
    },
    previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("imgPreview").src = oFREvent.target.result;
        };
    },
    submitForm(){
        this.currentForm.submit();
        
    }
    
}

