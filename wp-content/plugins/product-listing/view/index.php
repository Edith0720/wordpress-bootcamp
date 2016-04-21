<div 
	class="row" data-ng-app="product" 
	data-ng-controller="productListController">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>{{ translates.Name }}</th>
					<th>{{ translates.Price }}</th>
					<th>{{ translates.Insdate }}</th>
					<th>{{ translates.Commands }}</th>
				</tr>
			</thead>
			<tbody>
				<tr data-ng-repeat="product in products track by $index">
					<th scope="row">{{ product.id }}</th>
					<td>
						<input data-ng-model="product.name">
					</td>
					<td>
						<input data-ng-model="product.price">
					</td>
					<td>
						<input data-ng-model="product.created_at">
					</td>
					<td>
						<button 
							class="btn btn-primary btn-xs" 
							data-ng-click="updateProduct(product)">
								<span class="glyphicon glyphicon-refresh"></span>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
</div>