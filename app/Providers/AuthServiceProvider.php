use App\Models\Product;
use App\Policies\ProductPolicy;

protected $policies = [
    Product::class => ProductPolicy::class,
];