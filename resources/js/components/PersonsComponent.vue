<template>
    <div class="table-responsive">
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
        }
    },
    mounted() {
        this.dataTableInit();
    },
    methods: {
        dataTableInit() {
            console.log('here');
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
    }
}
</script>

<style scoped>

</style>
