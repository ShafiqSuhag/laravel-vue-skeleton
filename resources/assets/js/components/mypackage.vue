<template>

	<div class="col-md-12 no-print" id="treatment">
		<div class="card card-warning card-outline " v-bind:class="this.settings.isCollapsedCard"><!--collapsed-card-->
			<div class="card-header">
				<h3 class="card-title">Previous Dental History</h3>

				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				</div>
			<!-- /.card-tools -->
			</div>
			<div class="card-body" >
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">

							<!--teeth numbering start-->
							<div class="row ">
								<div class="btn-group" role="group" aria-label="Basic example">
									{{treatment.clinical_findings}}
									<a class="btn btn-outline-success " href="#" @click.prevent="isAdultTeethShow=true" >ADULT</a>
									<a class="btn btn-outline-primary " href="#" @click.prevent="isAdultTeethShow=false" >CHILD</a>
								</div>
							</div>
							<adult :teethAdult="teethAdult" @teethSelectAdult="teethSelectAdult" v-show="isAdultTeethShow"/>
							<child :teethChild="teethChild" @teethSelectChild="teethSelectChild" v-show="!isAdultTeethShow"/>

							<!--teeth numbering end-->


						</div>
						<div class="col-md-9 col-sm-6">

							<div class="row " style="padding: 5px 5px 0 5px">
								<div class="col-md-1">
									<input type="text" class="form-control" placeholder="" style="background-color: greenyellow;color: black"  v-model="treatment.teeth_no">
								</div>
								<div class="col-md-3">
									<input type="date" class="form-control" v-model="treatment.date">
								</div>
								<div class="col-md-3">
									<input style="" type="text" class="p_update_critical_finding form-control " value="32" name="critical_finding" id="" list="clinical_findings" placeholder="clinical findings" v-model="treatment.clinical_findings">
									<datalist id="clinical_findings">

										<option value="Caries on">Caries on</option>
										<option value="Cc">Cc</option>
										<option value="Gross caries on">Gross caries on</option>
										<option value="Abrassion on">Abrassion on</option>
										<option value="Attrition on">Attrition on</option>
										<option value="Erosion on">Erosion on</option>
										<option value="BDR">BDR</option>
										<option value="BDC">BDC</option>
										<option value="Calculas">Calculas</option>
										<option value="Stain">Stain</option>
										<option value="Flabby Gum">Flabby Gum</option>
										<option value="Gum swelling on">Gum swelling on</option>
										<option value="Mobility on">Mobility on</option>
										<option value="Ulceration on">Ulceration on</option>
										<option value="Dislodge restoration on">Dislodge restoration on</option>
										<option value="Fractured prosthesis(crown) on">Fractured prosthesis(crown) on</option>
										<option value="Missing">Missing</option>

									</datalist>
								</div>
								<div class="col-md-3">
									<input type="text" class="p_update_treatment form-control " value="" name="treatment" id="" list="treatment_done" placeholder="Treatment" v-model="treatment.treatment_apply">
									<datalist id="treatment_done">
										<option value="">Select Deases</option>
										<option value="RCT on">RCT on</option>
										<option value="Crown on">Crown on</option>
										<option value="LCCF on">LCCF on</option>
										<option value="GIF  on">GIF  on</option>
										<option value="Pulpotomy  on">Pulpotomy  on</option>
										<option value="Pulpectomy  on">Pulpectomy  on</option>
										<option value="Extraction  of">Extraction  of</option>
										<option value="Surgical Extraction  of">Surgical Extraction  of</option>
										<option value="Partial denture">Partial denture</option>
										<option value="Flexi denture">Flexi denture</option>
										<option value="Screw post build up on">Screw post build up on</option>
										<option value="Operculectomy  on">Operculectomy  on</option>
										<option value="Apisectomy">Apisectomy</option>
										<option value="Apical curettage on">Apical curettage on</option>
										<option value="Deep curettage under LA">Deep curettage under LA</option>
										<option value="Scaling with polishing">Scaling with polishing</option>
										<option value="Tooth whitening">Tooth whitening</option>
										<option value="Orthodontic braces">Orthodontic braces</option>
									</datalist>
								</div>
								<div class="btn-group" role="group" aria-label="Basic example">
									<button type="button" class="btn btn-default" @click="save_treatment">SAVE</button>
									<button type="button" class="btn btn-default" @click="get_treatment_list"><i class="fa fa-refresh"></i></button>
								</div>



							</div>



							<div class="row">
								<!--timeline start-->
								<div class="col-md-12" style="
    max-height:400px;
    overflow-y: scroll;
    background: ivory;">
									<!-- The time line -->

									<div v-for="treatment_date in this.treatment.treatment_list">
										<ul class="timeline"  >
											<!-- timeline time label -->
											<li class="time-label">
                                                              <span class="bg-red">
                                                                {{ treatment_date[0].treatment_date  }}
                                                              </span>
											</li>
											<!-- /.timeline-label -->
											<!-- timeline item -->

											<!-- END timeline item -->
											<!-- timeline item -->
											<li v-for="item in treatment_date">

												<!--<i class="fa " style="background-color: white;color: black"> {{ item.teeth_no }} </i>-->

												<div class="timeline-item">
													<span class="time" style="font-size: 15px"><i class="fa fa-clock-o"></i> Note: {{item.note}}
														<button @click="askDeleteMethod(item.id,true,false)" class="btn btn-outline-danger	 btn-sm" v-show="!askDelete"><i class="fa fa-close"></i></button>
														<button @click="askDeleteMethod(item.id,false,true)" class="btn btn-outline-danger	 btn-sm" v-show="askDelete">Confirm Delete</button>
														<button @click="askDeleteMethod(item.id,false,false)" class="btn btn-outline-success	 btn-sm" v-show="askDelete">No</button>
													</span>

													<h3 class="timeline-header no-border"> <b> <span style="color: blue"> Teeth : </span> {{ item.teeth_no }}  | <span style="color: coral">CF : </span> {{item.critical_finding}} |   <span style="color: limegreen">TA: </span>{{item.treatment}}</b> </h3>
												</div>
											</li>

											<!-- END timeline item -->


										</ul>
									</div>

								</div>
								<!--timeline end-->
							</div>
						</div>
					</div>

				</div>


			</div>

			<div class="overlay" v-show="!settings.patientDentalHistoryTab.isEnable || !settings.isPatientIdExist">
				<i class="fa " v-show="settings.patientDentalHistoryTab.isEnableLoader ">
					<i class="fa fa-refresh fa-spin"></i>  {{ settings.patientDentalHistoryTab.msg }}
				</i>
			</div>
		</div>

	</div>

</template>
<script>

	 import child from './tooth-cart/child';
	 import adult from './tooth-cart/adult';

    export default {
		components :{
			adult: adult,
			child: child,

		},
        props: ['settingsMethod','settings','patient_contact'],
		methods:{
            askDeleteMethod(id,askDeleteValue,confirmDelete){
              console.log(id);
              console.log(confirmDelete);
              this.askDelete = askDeleteValue;
              if(confirmDelete === true ){
                  console.log('confirm delete');
                  this.$emit('settingsMethod','patientDentalHistoryTab',false,true,'Deleting ...');
                  axios.get('previous-dental-info-delete/'+id)

					  .then(res=>{
                          this.get_treatment_list();
					  })
					  .catch(error=>{
					      console.log(error);
					  })
			  }
			},

            newTreatment: function () {
                this.treatment.treatment_list = [];
            },
            teethSelectAdult: function($id){
                console.log($id);

                this.treatment.teeth_no = $id.substr(1);


                // this.teeth.t31='blue';
                // this.teeth.t31 = 'black' ;
                // this.teeth.t30 = 'black' ;
                console.log('sd');
                console.log(this.teethAdult[$id]);
                if(this.teethAdult[$id] === 'white'){
                    console.log('t1');
                    this.teethAdult[$id] = '#e6ebed';
                }
                else if(this.teethAdult[$id] === '#e6ebed'){
                    this.teethAdult[$id] = 'white';
                }
                else {
                    console.log('t2');

                }
            },
			teethSelectChild: function($id){
				console.log($id);

				this.treatment.teeth_no = $id.substr(1);


				// this.teeth.t31='blue';
				// this.teeth.t31 = 'black' ;
				// this.teeth.t30 = 'black' ;
				// console.log('sd');
				// console.log(this.teethChild[$id]);
				// if(this.teethChild[$id] === 'white'){
				// 	console.log('t1');
				// 	this.teethChild[$id] = '#e6ebed';
				// }
				// else if(this.teethChild[$id] === '#e6ebed'){
				// 	this.teethChild[$id] = 'white';
				// }
				// else {
				// 	console.log('t2');
				//
				// }
			},
            save_treatment: function () {
                this.$emit('settingsMethod','patientDentalHistoryTab',false,true,'Saving...');

                axios.post('/admin/previous-dental-info-entry-update-for-patient',{
                    treatment:this.treatment,
                    pid: this.patient_contact.p_id
                })
                    .then(res=>{
                    	console.log("now clear the clinical findings.");
						console.log(this.treatment.clinical_findings);
                    	this.treatment.clinical_findings = "";
                    	console.log(this.treatment.clinical_findings);
						console.log("now clear the clinical findings.-done");
						this.treatment.teeth_no = "";
						this.treatment.treatment_apply = "";
                        this.get_treatment_list();

                        // console.log(res.data);
                        // console.log('treatment save 1');
                        // this.treatment.treatment_list =res.data;
                        // console.log('treatment save 2');
                        // this.treatment.

                        // this.$emit('settingsMethod','treatment');
                        // this.settings.isPatientIdExist =true ;
                    })
                    // .error(res=>{
                	 //    console.log(res.data);
                     //    this.settings.isPatientIdExist =true ;
					// })


            },
            get_treatment_list: function () {
                if(this.patient_contact.p_id >0){

				}else{ return}
                this.$emit('settingsMethod','patientDentalHistoryTab',false,true,'Loading Previous Dental History.3..');

                axios.get('get-all-previous-dental-history/'+this.patient_contact.p_id+'/'+Date.now())
                    .then(this.sleeper(100)).then(res=>{
	                    this.$emit('settingsMethod','patientDentalHistoryTab');


                    // this.treatment.treatment_list = res.data;
                    const grouped = _.groupBy(res.data, 'treatment_date');
                    console.log(grouped);
                    this.treatment.treatment_list =grouped;


                });

            },
            sleeper:   function(ms) {
                return function(x) {
                    return new Promise(resolve => setTimeout(() => resolve(x), ms));
                };
            },
		},
		data(){
            return{

                //boolean values | switches
				askDelete : false,
				isAdultTeethShow : true,


                treatment: {
                    teeth_no: null,
                    date : null,
                    clinical_findings : null,
                    treatment_apply : null,
                    note : null,
                    treatment_list: [],

                },
                teethAdult: {

                    t1 : 'white',
                    t2 : 'white',
                    t3 : 'white',
                    t4 : 'white',
                    t5 : 'white',
                    t6 : 'white',
                    t7 : 'white',
                    t8 : 'white',

                    t9 : 'white',
                    t10 : 'white',
                    t11 : 'white',
                    t12 : 'white',
                    t13 : 'white',
                    t14 : 'white',
                    t15 : 'white',
                    t16 : 'white',

                    t17 : 'white',
                    t18 : 'white',
                    t19 : 'white',
                    t20 : 'white',
                    t21 : 'white',
                    t22 : 'white',
                    t23 : 'white',
                    t24 : 'white',

                    t25 : 'white',
                    t26 : 'white',
                    t27 : 'white',
                    t28 : 'white',
                    t29 : 'white',
                    t30 : 'white',
                    t31 : 'white',
                    t32 : 'white',
                },
				teethChild: {

					t1 : 'white',
					t2 : 'white',
					t3 : 'white',
					t4 : 'white',
					t5 : 'white',
					t6 : 'white',
					t7 : 'white',
					t8 : 'white',

					t9 : 'white',
					t10 : 'white',
					t11 : 'white',
					t12 : 'white',
					t13 : 'white',
					t14 : 'white',
					t15 : 'white',
					t16 : 'white',

					t17 : 'white',
					t18 : 'white',
					t19 : 'white',
					t20 : 'white',
					t21 : 'white',
					t22 : 'white',
					t23 : 'white',
					t24 : 'white',

					t25 : 'white',
					t26 : 'white',
					t27 : 'white',
					t28 : 'white',
					t29 : 'white',
					t30 : 'white',
					t31 : 'white',
					t32 : 'white',
				},

			}
		}

    }
</script>
<style scoped>

</style>