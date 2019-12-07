<template id="image-input-template">
    <div class="form-group row">
        <label for="image" class="col-md-3 col-form-label ">Изображение</label>
        <div class="col-md">
            <input @change="previewThumbnail" class="form-control-file" name="image" type="file">
        </div>
        <div class="col-md">
            <i v-show="! image_src" class="icon fa fa-picture-o"></i>
            <img v-show="image_src" class="img img-thumbnail" style="max-height: 200px; float: right" :src="image_src">
        </div>
    </div>

</template>

<script>
    export default {
        props: [ 'image_src' ]
        ,mounted() {

        }
        ,methods: {
            previewThumbnail: function(event) {
                var input = event.target;

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var vm = this;

                    reader.onload = function(e) {
                        vm.image_src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    }
</script>
