<template>
    <div>
        <h1 class="">Emolpyees</h1> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div v-if="showMessage">
                            <div class="alert alert-success">
                                {{ message }}
                            </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <form>
                                    <div class="form-row align-items-center">
                                    <div class="col">
                                        <input
                                            type="search"
                                            v-model.lazy="search" 
                                            class="form-control mb-2"
                                            placeholder="Jane Doe">
                                    </div>
                                    <div class="col">
                                        <button 
                                            type="submit" 
                                            class="btn btn-primary mb-2"
                                            >Search</button
                                        >
                                    </div>
                                    <div class="col">
                                        <select
                                            v-model="selectedDepartment"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id"
                                                >{{ department.name }}</option
                                            >
                                        </select>
                                    </div>

                                    </div>
                                </form>
                            </div>
                            <div>
                                <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary mb-2">Create</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Department</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="employee in employees" :key="employee.id">
                                    <th scope="row">#{{ employee.id }}</th>
                                    <th>{{ employee.first_name }}</th>
                                    <th>{{ employee.last_name }}</th>
                                    <th>{{ employee.address }}</th>
                                    <td>{{ employee.department.name }}</td>
                                    <td>
                                        <router-link 
                                            :to="{
                                                name: 'EmployeesEdit',
                                                params:{id: employee.id}
                                            }"
                                            class="btn btn-success">Edit</router-link
                                        >
                                        <button class="btn btn-danger"
                                            @click="deleteEmployee(employee.id)"
                                            >Delete</button
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: '',
            search: null,
            selectedDepartment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDepartment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees(){
            axios.get('/api/employees', {
                params: {
                    search: this.search,
                    department_id: this.selectedDepartment
                }
            })
            .then(res => {
                this.employees = res.data.data
            }).catch(error => {
                console.log(error);
            })
        },
        getDepartments(){
            axios.get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                }).catch(error => {
                    console.log(console.error)
                });
        },
        deleteEmployee(id){
            axios.delete('api/employees/'+id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getEmployees();
                })
        }
    }
};
</script>

<style>

</style>