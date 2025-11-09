<?php ob_start(); ?>
<table style="table-layout: fixed;">
	<tr>
		<th class='light sort active' data-sort='city' data-order="DESC">
			<div>
				<span class="table-title">CITY</span>
				<span class="caret">▼</span>
			</div>
		</th>
		<th class='dark sort' data-sort='population' data-order="DESC">
			<div>
				<span class="table-title">POPULATION</span>
				<span class="caret"></span>
			</div>
		</th>
		<th class='light sort' data-sort='murder_homicide' data-order="DESC">
			<div>
				<span class="table-title">MURDER / HOMICIDE <br> (per 100K)</span>
				<span class="caret"></span>
			</div>
		</th>
		<th class='dark sort' data-sort='rape' data-order="DESC">
			<div>
				<span class="table-title">RAPE <br> (per 100K)</span>
				<span class="caret"></span>
			</div>
		</th>
		<th class='light sort' data-sort='robbery' data-order="DESC">
			<div>
				<span class="table-title">ROBBERY <br> (per 100K)</span>
				<span class="caret"></span>
			</div>
		</th>
		<th class='dark sort' data-sort='assault' data-order="DESC">
			<div>
				<span class="table-title">AGGRAVATED ASSAULT <br> (per 100K)</span>
				<span class="caret"></span>
			</div>
		</th>
		<th class='light sort' data-sort='violent_crime' data-order="DESC">
			<div>
				<span class="table-title">ALL VIOLENT CRIMES <br> (per 100K)</span>
				<span class="caret"></span>
			</div>
		</th>
	</tr>
</table>
<div class="cities-data"><?php echo $table; // WPCS: XSS ok. ?></div>
<?php
$output = ob_get_clean();
ob_flush();

return $output;
