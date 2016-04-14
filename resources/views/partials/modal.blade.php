<div class="modal-backdrop fade in">
	<div class="modal-content popup-loading-indicator"></div>
</div>

<div class="control-popup modal modal-primary fade in" tabindex="-1" aria-hidden="false" style="display: block;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="popup">×</button>
				<h4 class="modal-title">{{ $modal['title'] }}</h4>
			</div> <!-- </modal-header> -->

			<div class="modal-body form-container">
				<form>
					<div data-control="formwidget" class="form-widget form-elements layout" role="form">
						<div class="layout-row min-size">
							<div class="form-tabless-fields">
								@foreach($modal['fields'] as $name => $field)
									<?php extract($field, EXTR_PREFIX_SAME, "wddx"); ?>

									{!! Form::group($type, $name, $label, $value ?? null, [
										'placeholder' => $placeholder ?? null,
										'maxlength' => $maxlength ?? null
									]) !!}
								@endforeach

								<div class="form-group dropdown-field span-right" data-field-name="type">
									<label for="type">Type</label>

									<select name="type" class="form-control custom-select select2-hidden-accessible" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
										<option value="url">URL</option>
										<option value="header">Header</option>
										<option value="cms-page">CMS Page</option>
										<option value="blog-category">Blog Category</option>
										<option value="all-blog-categories">All Blog Categories</option>
										<option value="static-page">Static Page</option>
										<option value="all-static-pages">All Static Pages</option>
									</select>

									<span class="select2 select2-container select2-container--default" dir="ltr">
										<span class="selection">
											<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
												<span class="select2-selection__rendered" title="URL">URL</span>
												<span class="select2-selection__arrow" role="presentation">
													<b role="presentation"></b>
												</span>
											</span>
										</span>

										<span class="dropdown-wrapper" aria-hidden="true"></span>
									</span>
								</div> <!-- </form-group> -->

								<div class="form-group text-field span-full" data-field-name="url">
									<label for="url">URL</label>
									<input type="text" name="url" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
								</div> <!-- </form-group> -->

								<div class="form-group dropdown-field span-full   input-sidebar-control" data-field-name="reference" style="display: none;">
									<label for="reference">Reference</label>

									<select name="reference" class="form-control custom-select select2-hidden-accessible" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
									</select>

									<span class="select2 select2-container select2-container--default" dir="ltr">
										<span class="selection">
											<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
												<span class="select2-selection__rendered"></span>
												<span class="select2-selection__arrow" role="presentation">
													<b role="presentation"></b>
												</span>
											</span>
										</span>

										<span class="dropdown-wrapper" aria-hidden="true"></span>
									</span>

									<a class="sidebar-control" href="#">
										<i class="icon-refresh"></i>
									</a>
								</div> <!-- </form-group> -->

								<div class="form-group  dropdown-field span-full   input-sidebar-control" data-field-name="cmsPage" style="display: none;">
									<label for="cms-page">CMS Page</label>

									<select name="cmsPage" class="form-control custom-select select2-hidden-accessible" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
									</select>

									<span class="select2 select2-container select2-container--default" dir="ltr">
										<span class="selection">
											<span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
												<span class="select2-selection__rendered"></span>
												<span class="select2-selection__arrow" role="presentation">
													<b role="presentation"></b>
												</span>
											</span>
										</span>

										<span class="dropdown-wrapper" aria-hidden="true"></span>
									</span>

									<p class="help-block">Select a page to open when the menu item is clicked.</p>
									<a class="sidebar-control" href="#">
										<i class="icon-refresh"></i>
									</a>
								</div> <!-- </form-group> -->

								<div class="form-group checkbox-field span-full" data-field-name="nesting" style="display: none;">
									<div class="checkbox custom-checkbox" tabindex="0">
										<input type="hidden" name="nesting" value="0">
										<input type="checkbox" name="nesting" value="1">

										<label for="nesting">Allow nested items</label>
										<p class="help-block">Nested items could be generated dynamically by static page and some other item types</p>
									</div>
								</div> <!-- </form-group> -->

								<div class="form-group checkbox-field span-full" data-field-name="replace" style="display: none;">
									<div class="checkbox custom-checkbox" tabindex="0">
										<input type="hidden" name="replace" value="0">
										<input type="checkbox" name="replace" value="1">

										<label for="replace">Replace this item with its generated children</label>
										<p class="help-block">Use this checkbox to push generated menu items to the same level with this item. This item itself will be hidden.</p>
									</div>
								</div> <!-- </form-group> -->
							</div> <!-- </form-tabless-fields> -->
						</div> <!-- </layout-row> -->
					</div> <!-- </form-widget> -->
				</form>
			</div> <!-- </modal-body> -->

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-control="apply-btn">Apply</button>
				<button type="button" class="btn btn-default" data-dismiss="popup">Cancel</button>
			</div>
		</div>
	</div>
</div>