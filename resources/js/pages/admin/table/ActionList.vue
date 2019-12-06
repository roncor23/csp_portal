<template>
	<div>
		<notifications group="foo" position="bottom right" />
		            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                
                <a href="#addModal" class="btn btn-success btn-sm" data-toggle="modal"><i class="fas fa-table"></i>&nbsp;<span>Add New</span></a>
                <div style="float:right">

                <span>Search:</span>&nbsp;<input type="text" v-model="search">

                </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:9px">
                    <thead >
                      <tr>
 						  <th>ID</th>
			              <th>In/Out</th>
			              <th>CSP/Kto12</th>
			              <th>Subject</th>
			              <th>Concern</th>
			              <th>From</th>
			              <th>Action required</th>
			              <th>Support needed</th>
			              <th>Responsible person</th>
			              <th>Status</th>
			              <th>Remarks</th>
			              <th>AddedBy</th>
			              <th>UpdatedBy</th>
			              <th>Created_at</th>
			              <th>Updated_at</th>
			              <th>Actions</th>
                      </tr>
                    </thead>
                    <tfoot >
                      <tr>
 						  <th>ID</th>
			              <th>In/Out</th>
			              <th>CSP/Kto12</th>
			              <th>Subject</th>
			              <th>Concern</th>
			              <th>From</th>
			              <th>Action required</th>
			              <th>Support needed</th>
			              <th>Responsible person</th>
			              <th>Status</th>
			              <th>Remarks</th>
			              <th>AddedBy</th>
			              <th>UpdatedBy</th>
			              <th>Created_at</th>
			              <th>Updated_at</th>
			              <th>Actions</th>
                      </tr>
                    </tfoot>  
                    <tbody v-if="filteredBlogs.length > 0">
						<tr class="table_data" v-for="(i,index) in pageOfItems" :key="i.id">
							<td>{{index}}</td>
			                <td>{{i.in_out}}</td>
			                <td>{{i.csp_kto12}}</td>
			                <td>{{i.subject}}</td>
			                <td>{{i.concern}}</td>
			                <td>{{i.from}}</td>
			                <td>{{i.action_required}}</td>
			                <td>{{i.support_needed}}</td>
			                <td>{{i.responsible_person}}</td>
			                <td>{{i.status}}</td>
			                <td>{{i.remarks}}</td>
			                <td>{{i.addedBy}}</td>
			                <td>{{i.updatedBy}}</td>
			                <td>{{i.created_at}}</td>
			                <td>{{i.updated_at}}</td>
			                <td>
			                  <button type="button" class="btn btn-info btn-sm" @click="editItem(i)" data-toggle="modal" data-target="#editModal"><i class="fas fa-pen-square"></i></button>
			                  <button type="button" class="btn btn-danger btn-sm" @click="removeData(i.id)"><i class="far fa-trash-alt"></i></button>
			                </td>
		                </tr> 
                    </tbody>
                    <tbody  v-else>
                    	 <tr>
                    	 	<td colspan="16"><p style="color:red; text-align:center">NO DATA FOUND!</p></td>
                    	 </tr>
                    </tbody>
                   
                  </table>
                
		        <nav aria-label="Page navigation" style="float:right">
		            <jw-pagination v-if="filteredBlogs.length" :items="filteredBlogs"  :pageSize="countPage" :maxPages="3" @changePage="onChangePage"></jw-pagination> 
		        </nav>

                </div>
              </div>
         </div>

            		  <!-- Edit Modal -->
		  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Editing Action List</h5>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        </div>
		        <div class="modal-body">
		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">IN/OUt</span>
		            <select class="custom-select" v-model="selectedItem.in_out">
					  <option value="Incoming">INCOMING</option>
					  <option value="Outgoing">OUTGOING</option>
					</select>
		          </div>
		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">CSP/K12</span>
		            <select class="custom-select" v-model="selectedItem.csp_kto12">
					  <option value="CSP">CSP</option>
					  <option value="K12">Kto12</option>
					</select>
		          </div>
		          <div class="form-group" >
		          	<span style="font-size:12px;font-weight:bold">SUBJECT</span>
		          	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject" v-model="selectedItem.subject">
		          </div>
		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">CONCERN</span>
		          	<textarea type="text" class="form-control" id="exampleFormControlInput1" placeholder="Concern" v-model="selectedItem.concern"></textarea>
		          </div>
		          <div class="form-group">
		            <span style="font-size:12px;font-weight:bold">FROM</span>
		          	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="From" v-model="selectedItem.from">
		          </div>
		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">ACTION REQUIRED</span>
		          	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Action required" v-model="selectedItem.action_required">
		          </div>
		          <div class="form-group">
		      		<span style="font-size:12px;font-weight:bold">SUPPORT NEEDED</span>
		            <select class="custom-select" v-model="selectedItem.support_needed">
					  <option value="PTS">PTS</option>
					  <option value="RD's Approval">RD's Approval</option>
					</select>
		          </div>
		          <div class="form-group">
		            <span style="font-size:12px;font-weight:bold">RESPONSIBLE PERSON</span>
		            <select class="custom-select" v-model="selectedItem.responsible_person">
					  <option value="PTS team">PTS team</option>
					  <option value="Wenna">Wenna</option>
					  <option value="Krizia">Krizia</option>
					  <option value="Dave">Dave</option>
					  <option value="Valerie">Valerie</option>
					  <option value="Ronan">Ronan</option>
					</select>
		          </div>

		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">STATUS</span>
		            <select class="custom-select" v-model="selectedItem.status">
					  <option value="Done">Done</option>
					  <option value="Not yet done">Not yet done</option>
					  <option value="On-going">On-going</option>
					</select>
		          </div>
	
		          <div class="form-group">
		          	<span style="font-size:12px;font-weight:bold">REMARKS</span>
		          	<textarea type="text" class="form-control" id="exampleFormControlInput1" placeholder="Remarks" v-model="selectedItem.remarks"></textarea>
		          </div>      
		        </div>

		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		          <button type="button" class="btn btn-primary" @click="updateData(selectedItem.id)" data-dismiss="modal">Save changes</button>
		        </div>
		      </div>
		    </div>
		  </div>

		  <!-- Add Modal -->
		  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="exampleModalLabel">Add Action List</h5>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        </div>
		        <div class="modal-body">
		          <div class="form-group">
		            <select class="custom-select" v-model="in_out" id="in_out">
					  <option :value="null">IN/OUT</option>
					  <option value="Incoming">Incoming</option>
					  <option value="Outgoing">Outgoing</option>
					</select>
		          </div>
		          <div class="form-group">
		            <select class="custom-select" v-model="csp_kto12" id="csp_kto12">
					  <option :value="null">CSP/K12</option>
					  <option value="CSP">CSP</option>
					  <option value="K12">K12</option>
					</select>
		          </div>
		          <div class="form-group" >
		          	<input type="text" class="form-control" id="subject" placeholder="Subject" v-model="subject">
		          </div>
		          <div class="form-group">
		          	<textarea type="text" class="form-control" id="concern" placeholder="Concern" v-model="concern"></textarea>
		          </div>
		          <div class="form-group">
		          	<input type="text" class="form-control" id="from" placeholder="From" v-model="from">
		          </div>
		          <div class="form-group">
		          	<input type="text" class="form-control" id="action_required" placeholder="Action required" v-model="action_required">
		          </div>
		          <div class="form-group">
		            <select class="custom-select" id="support_needed" v-model="support_needed" >
					  <option :value="null">Support needed</option>
					  <option value="PTS">PTS</option>
					  <option value="RD's Approval">RD's Approval</option>
					</select>
		          </div>
		          <div class="form-group">
		            <select class="custom-select" id="responsible_person" v-model="responsible_person">
					  <option :value="null">Responsible person</option>
					  <option value="PTS team">PTS team</option>
					  <option value="Wenna">Wenna</option>
					  <option value="Krizia">Krizia</option>
					  <option value="Dave">Dave</option>
					  <option value="Valerie">Valerie</option>
					  <option value="Ronan">Ronan</option>
					</select>
		          </div>

		          <div class="form-group">
		            <select class="custom-select" id="status" v-model="status">
					  <option :value="null">Status</option>
					  <option value="Done">Done</option>
					  <option value="Not yet done">Not yet done</option>
					  <option value="On-going">On-going</option>
					</select>
		          </div>
	
		          <div class="form-group">
		          	<textarea type="text" class="form-control" id="remarks" placeholder="Remarks" v-model="remarks"></textarea>
		          </div>       
		        </div>

		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		          <button type="button" class="btn btn-primary" @click="saveData">Save</button>
		        </div>
		      </div>
		    </div>
		  </div>
	</div>

</template>

<script>
import axios from 'axios'

  export default {
    data() {
      return {

	    selectedItem: {},
	    in_out: null,
	    csp_kto12: null,
	    subject: null,
	    concern: null,
	    from: null,
	    action_required: null,
	    support_needed: null,
	    responsible_person: null,
	    status: null,
	    remarks: null,
	   	items: [],
        pageOfItems: [],
        search: '',
        countPage: 5

      }
    },
    computed: {

    	filteredBlogs: function() {

    	var filter_search = this.search;



	      return this.items.filter((items) => {

	        return items.in_out.match(filter_search) || items.csp_kto12.match(filter_search) || items.subject.match(filter_search) || items.support_needed.match(filter_search) || items.responsible_person.match(filter_search) || items.status.match(filter_search) || items.remarks.match(filter_search) || items.created_at.match(filter_search) || items.updated_at.match(filter_search);

	      });
	    }
    },
    mounted() {
  		this.fetch_action_list();
    },
	  methods: {

	  	onChangePage(pageOfItems) {
            // update page of items
            this.pageOfItems = pageOfItems;
        },

	    editItem(i) {
	      this.selectedItem = i;
	    },

	   fetch_action_list() {

  		 axios.get('fetch/action_list/').then(result => {
	                  this.items = result.data.action_list;
	                  this.items.splice(index, 1);
      				  //this.bin.sort(ordonner);
	                  console.log(this.items);

	              }).catch(error => {
	                  console.log(error);
	              });

       },
	    saveData() {

	    	$('#in_out').css('border-color','');
            $('#csp_kto12').css('border-color','');
            $('#subject').css('border-color','');
            $('#concern').css('border-color','');
            $('#from').css('border-color','');
            $('#action_required').css('border-color','');
            $('#support_needed').css('border-color','');
            $('#responsible_person').css('border-color','');
            $('#status').css('border-color','');
            $('#remarks').css('border-color','');

            if(this.in_out && this.csp_kto12 && this.subject && this.concern && this.from  && this.action_required && this.support_needed && this.responsible_person && this.status && this.remarks) {

	      	this.formData = new FormData();
	        this.formData.append('in_out', this.in_out);
	        this.formData.append('csp_kto12', this.csp_kto12);
	        this.formData.append('subject', this.subject);
	        this.formData.append('concern', this.concern);
	        this.formData.append('from', this.from);
	        this.formData.append('action_required', this.action_required);
	        this.formData.append('support_needed', this.support_needed);
	        this.formData.append('responsible_person', this.responsible_person);
	        this.formData.append('status', this.status);
	        this.formData.append('remarks', this.remarks);

	        axios.post('action_list/admin', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
		        .then(response => {

		        	$('#addModal').modal('hide');
		        	this.fetch_action_list();
		        	this.resetForm();
		        	this.$notify({
					  group: 'foo',
					  title: 'Success',
					  text: 'Your action list has been successfully saved',
					  type: 'success'
					});


		        })
		        .catch(error => {
		            this.errors = error.response.data.errors;
		            console.log(this.errors);
		        });

		    }

		    if(!this.in_out) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select IN/OUT!',
					  type: 'warn'
					});
                $('#in_out').css('border-color','red');

            }

            if(!this.csp_kto12) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select CSP/K12!',
					  type: 'warn'
					});
                $('#csp_kto12').css('border-color','red');

            }

            if(!this.subject) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select subject!',
					  type: 'warn'
					});
                $('#subject').css('border-color','red');

            }

            if(!this.concern) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please input concern!',
					  type: 'warn'
					});
                $('#concern').css('border-color','red');

            }

            if(!this.from) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please input from!',
					  type: 'warn'
					});
                $('#from').css('border-color','red');

            }

            if(!this.action_required) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please input action required!',
					  type: 'warn'
					});
                $('#action_required').css('border-color','red');

            }

            if(!this.support_needed) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select support needed!',
					  type: 'warn'
					});
                $('#support_needed').css('border-color','red');

            }

            if(!this.responsible_person) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select responsible person!',
					  type: 'warn'
					});
                $('#responsible_person').css('border-color','red');

            }

            if(!this.status) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please select status!',
					  type: 'warn'
					});
                $('#status').css('border-color','red');
            }

            if(!this.remarks) {
                    this.$notify({
					  group: 'foo',
					  title: 'Warning',
					  text: 'Opps! Please input remaks!',
					  type: 'warn'
					});
                $('#remarks').css('border-color','red');

            } 
	 
	    },
	   	updateData($id) {


	      	this.formData = new FormData();
	        this.formData.append('in_out', this.selectedItem.in_out);
	        this.formData.append('csp_kto12', this.selectedItem.csp_kto12);
	        this.formData.append('subject', this.selectedItem.subject);
	        this.formData.append('concern', this.selectedItem.concern);
	        this.formData.append('from', this.selectedItem.from);
	        this.formData.append('action_required', this.selectedItem.action_required);
	        this.formData.append('support_needed', this.selectedItem.support_needed);
	        this.formData.append('responsible_person', this.selectedItem.responsible_person);
	        this.formData.append('status', this.selectedItem.status);
	        this.formData.append('remarks', this.selectedItem.remarks);

	        axios.post('update_action_list/admin/' + $id, this.formData, {headers: {'content-Type': 'multipart/form-data'}})
		        .then(response => {

		        	this.fetch_action_list();
		        	this.$notify({
					  group: 'foo',
					  title: 'Success',
					  text: 'Your action list has been successfully updated',
					  type: 'success'
					});

		        })
		        .catch(error => {
		            this.errors = error.response.data.errors;
		            console.log(this.errors);
		        });
	 
	    },
	    removeData($id) {

	        axios.post('remove_action_list/admin/' + $id, this.formData, {headers: {'content-Type': 'multipart/form-data'}})
		        .then(response => {

		        	this.fetch_action_list();
		        	this.$notify({
					  group: 'foo',
					  title: 'Success',
					  text: 'Your action list has been successfully removed',
					  type: 'success'
					});

		        })
		        .catch(error => {
		            this.errors = error.response.data.errors;
		            console.log(this.errors);
		        });
	 
	    },
	    resetForm() {
            this.formData = {};
            this.in_out = null;
            this.csp_kto12 = null;
            this.subject = '';
            this.concern = '';
            this.from = '';
            this.action_required = '';
            this.support_needed = null;
            this.responsible_person = null;
            this.status = null;
            this.remarks = '';

	  }
  }
}
</script>
<style scoped>

tr:hover {background-color:#f5f5f5;cursor:pointer}

nav.navbar{
  box-shadow: 2px 2px 8px rgba(0,0,0,.5);
  border-bottom: solid 2px #ddd;
  box-sizing:border-box;
}

fieldset{
  position:relative;
}



@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}


ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

.paginate-links.items {
  user-select: none;
  a {
    cursor: pointer;
  }
  li.active a {
    font-weight: bold;
  }
  li.next:before {
    content: ' | ';
    margin-right: 13px;
    color: #ddd;
  }
  li.disabled a {
    color: #ccc;
    cursor: no-drop;
  }
}


</style>

