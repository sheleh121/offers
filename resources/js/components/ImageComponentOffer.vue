<template >
    <div class="form-row">
        <label for="image" class="col-md col-form-label ">Изображение</label>
        <div class="form-group col-md">
            <input @change="previewThumbnail" class="form-control-file" name="image" id="image" type="file">
        </div>
        <div class="form-group col-md">
            <i v-if="image_path === undefined" class="icon fa fa-picture-o"></i>
            <img v-else class="img img-thumbnail" style="max-height: 400px" :src="'/images/' + image_path">
        </div>
    </div>

</template>

<script>
    export default {
        props: {image_path: undefined}
        ,mounted() {

        }


        ,methods: {
            previewThumbnail: function(event) {
                let input = event.target;
                let formData = new FormData();
                formData.append('image', input.files[0]);
                axios.post( '/images',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ) .then((response) =>{
                    this.image_path = response.data;
                    this.$emit('update:file', response.data);
                    console.log(response);
                });

            }

        }
    }
</script>
