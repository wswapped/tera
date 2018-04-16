<div class="m-grid__item m-grid__item--fluid m-wrapper">											
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
	 		<div class="mr-auto">
	 			<h3 class="m-subheader__title ">Dashboard - Shop categories</h3>			
				 		</div>
	  		<div>
	  							<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<span class="m-subheader__daterange-title"></span>
							<span class="m-subheader__daterange-date m--font-brand"></span>
						</span>
						<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
							<i class="la la-angle-down"></i>
						</a>
					</span>
				  		</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<!--Begin::Section-->
		<div class="m-portlet">
		  	<div class="m-portlet__body  m-portlet__body--no-padding">
			    <div class="row m-row--no-padding m-row--col-separator-xl">
				    <div class="col-xl-8">
						<!--begin::Portlet-->
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											Add category to shop
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="categories">
								<div class="m-portlet__body">
									<div class="m--margin-top-10 m--block-center alert m-alert m-alert--success">
										<?php
											if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['category-subt'])){
												//getting new category details
												$name = $_POST['catname']??"";
												$description = $_POST['catdes']??"";

												if($name){
													//here we can update the database
													$q = $conn->query("INSERT INTO categories(name, description, shop) VALUES(\"$name\", \"$description\", \"$user_shop\") ") or die("Error adding category $conn->error");

													if($q){
														?>
															<p class="m--font-success">Category added successfully</p>
														<?php
													}
												}
											}

										?>
									</div>

									<div class="form-group m-form__group m--margin-top-10">
										<div class="alert m-alert m-alert--default" role="alert">
											Here you can add categories which will be classified into products
										</div>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">Category name</label>
										<input type="text" class="form-control m-input" id="product_input" name="catname" aria-describedby="emailHelp" placeholder="Enter name" required="required">
										<span class="m-form__help">Customers sees this so it should be attracting</span>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleTextarea">Some description</label>
										<textarea class="form-control m-input" name="catdes" id="exampleTextarea" rows="3" required="required"></textarea>
										<input type="hidden" name="category-subt" value="<?php echo(md5(time())) ?>">
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
							</form>
							<!--end::Form-->			
						</div>
						<!--end::Portlet-->
					</div>
				    <div class="col-xl-4">
				        <!--begin:: Widgets/Revenue Change-->
						<div class="m-widget14">
							<div class="m-widget14__header">
								<h3 class="m-widget14__title">
									Product category percentages            
								</h3>
								<span class="m-widget14__desc">
									Category percentages
								</span>
							</div>
							<div class="row  align-items-center">
								<div class="col">
									<div id="m_chart_category_change" class="m-widget14__chart1" style="height: 180px">
									</div>
								</div>	
								<div class="col">
									<div class="m-widget14__legends">
										<div class="m-widget14__legend">
											<span class="m-widget14__legend-bullet m--bg-accent"></span>
											<span class="m-widget14__legend-text">37 Electronics</span>
										</div>
										<div class="m-widget14__legend">
											<span class="m-widget14__legend-bullet m--bg-warning"></span>
											<span class="m-widget14__legend-text">1 Others</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end:: Widgets/Revenue Change-->
					</div>
			    </div>
		  	</div>
		</div>
		<!--End::Section-->
	</div>
</div>