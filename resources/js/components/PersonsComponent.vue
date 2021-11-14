<template>
    <div class="table-responsive">
            <div class="row">
                <div class="col-xs-6">
                    <label class="bmd-label-floating" for="file"></label>
                    <input name="files" v-show="false" @change="onFileChange($event)" type="file" class="form-control"
                           id="file">
                    <button type="button" class="btn btn-secondary" @click="showRealInput()" id="real-input">Choose file
                    </button>
                    <div v-if="fileName.length">Uploaded file: {{ fileName }}</div>
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-info" @click="upload">
                        Upload
                    </button>
                </div>
                <div class="col-xs-6">
                    <H3> Male percent is: <strong>{{percent}}</strong></H3>
                </div>
            </div>
        <p v-if="errors.length">
            <b>Form has error:</b>
        <ul class="alert alert-danger">
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        </p>
        <table id="persons-table" class="cell-border" style="width:100%">
            <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Gender</th>
                <th>Birth day</th>
            </tr>
            </thead>
            <tbody></tbody>
            <tbody>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "PersonsComponent",
    data() {
        return {
            fileName: '',
            errors: [],
            percent: ''
        }
    },
    mounted() {
        this.dataTableInit();
        this.getMalePercent();
    },
    methods: {
        dataTableInit() {
            this.table = $('#persons-table').DataTable({
                ajax: "getPersons",
                serverSide: false,
                processing: true,
                responsive: true,
                searching: true,
                paging: true,
                bLengthChange: true,
                columns: [
                    {
                        data(data) {
                            return `${data.number}</a>`;
                        }
                    },
                    {
                        data(data) {
                            return  `${data.name}`;
                        }
                    },
                    {
                        data(data) {
                            return `${data.last_name}`;
                        }
                    },
                    {
                        data(data) {
                            return `${data.gender}`;
                        }
                    },
                    {
                        data(data) {
                            return `${data.date_of_birth}`;
                        }
                    },
                ],
                order: [
                    [0, 'desc']
                ],
            });
        },
        upload() {
            if (this.fileName.length <= 1) {
                this.errors = [];
                this.errors.push('Document is required here');
            }
            if (this.errors.length) {
                return false;
            } else {
                let formData = new FormData();
                formData.append('files', this.fileData);
                window.axios.post('persons/import',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        // $('#persons-table').DataTable().ajax.reload();
                        bootbox.alert(response.data.message);
                    })
                    .catch(error => {
                        bootbox.alert('Error');
                    });
            }
        },
        onFileChange() {
            this.errors = [];
            this.fileData =  event.target.files[0];
            this.fileName = this.fileData.name;
            if (this.fileName.length <= 0) {
                this.errors.push('Select document for upload');
            }
        },
        showRealInput() {
            $('#file').click();
        },
        getMalePercent() {
            window.axios.get(`getMalePercent`)
                .then(response => {
                        this.percent = response.data.data + '%';
                })
        }
    }
}
</script>

<style scoped>
.row {
    padding-bottom: 20px;
}
.col-xs-6 {
    padding-right: 20px;
}
</style>
