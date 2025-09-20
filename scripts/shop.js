
			function changeSort(sortValue) {
				const url = new URL(window.location);
				url.searchParams.set('sort', sortValue);
				url.searchParams.set('page', '1'); 
				window.location.href = url.toString();
			}

			function removeFilter(filterType) {
				const url = new URL(window.location);
				
				switch(filterType) {
					case 'search':
						url.searchParams.delete('search');
						break;
					case 'brand':
						url.searchParams.delete('brand');
						break;
					case 'category':
						url.searchParams.delete('category');
						break;
					case 'color':
						url.searchParams.delete('color');
						break;
					case 'size':
						url.searchParams.delete('size');
						break;
					case 'price':
						url.searchParams.delete('min_price');
						url.searchParams.delete('max_price');
						break;
				}
				
				url.searchParams.set('page', '1'); 
				window.location.href = url.toString();
			}

			function clearFilters() {
				window.location.href = window.location.pathname;
			}

			document.querySelector('.search-input').addEventListener('keypress', function(e) {
				if (e.key === 'Enter') {
					this.closest('form').submit();
				}
			});

			document.querySelectorAll('.filter-select, .filter-input').forEach(function(element) {
				element.addEventListener('change', function() {
					setTimeout(() => {
						document.getElementById('filter-form').submit();
					}, 100);
				});
			});