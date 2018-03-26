<?php
	$Product = getClass('product');
	$products = $Product->get(100);
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">											
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
	 		<div class="mr-auto">
	 			<h3 class="m-subheader__title ">Dashboard</h3>
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
											Add product to shop
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right">
								<div class="m-portlet__body">
									<div class="form-group m-form__group m--margin-top-10">
										<div class="alert m-alert m-alert--default" role="alert">
											Here you can add products so they could be visible to your customers on the platform
										</div>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">Product name</label>
										<input type="text" class="form-control m-input" id="product_input" aria-describedby="emailHelp" placeholder="Enter name">
										<span class="m-form__help">Customers sees this so it should be attracting</span>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleInputPassword1">Quantity available</label>
										<input type="number" class="form-control m-input" id="exampleInputPassword1" placeholder="number">
										<span class="m-form__help">This will help customers to know if they can buy</span>
									</div>
									<div class="form-group m-form__group">
										<label>Price:</label>
										<input type="number" class="form-control m-input" id="exampleInputPassword1" placeholder="number">
										<span class="m-form__help">Let it sound affordable</span>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleSelect1">Category</label>
										<select class="form-control m-input" id="exampleSelect1">
											<option>Resistors</option>
											<option>Capacitors</option>
											<option>Diodes</option>
											<option>Others</option>
										</select>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleTextarea">Some description</label>
										<textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
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
									<div id="m_chart_product_percentage" class="m-widget14__chart1" style="height: 180px">
									</div>
								</div>	
								<div class="col">
									<div class="m-widget14__legends">
										<div class="m-widget14__legend">
											<span class="m-widget14__legend-bullet m--bg-accent"></span>
											<span class="m-widget14__legend-text">10% Capacitors</span>
										</div>
										<div class="m-widget14__legend">
											<span class="m-widget14__legend-bullet m--bg-warning"></span>
											<span class="m-widget14__legend-text">7% Diodes</span>
										</div>
										<div class="m-widget14__legend">
											<span class="m-widget14__legend-bullet m--bg-brand"></span>
											<span class="m-widget14__legend-text">20% Resistors</span>
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

		<!--Begin::Section => products-->
		<div class="m-portlet m-portlet--mobile  m-portlet--rounded">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Products in your shop
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
									<i class="la la-ellipsis-h m--font-brand"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">Quick Actions</span>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-share"></i>
														<span class="m-nav__link-text">Create Post</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">Send Messages</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-multimedia-2"></i>
														<span class="m-nav__link-text">Upload File</span>
														</a>
													</li>
													<li class="m-nav__section">
														<span class="m-nav__section-text">Useful Links</span>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">FAQ</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-lifebuoy"></i>
														<span class="m-nav__link-text">Support</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit m--hide">
													</li>
													<li class="m-nav__item m--hide">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<div class="m_datatable" id="products_datatable"></div>
				<!--end: Datatable -->
			</div>
		</div>
		<!--End::Section-->		

	</div>
</div>