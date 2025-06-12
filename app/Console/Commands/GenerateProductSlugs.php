<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GenerateProductSlugs extends Command
{
    protected $signature = 'products:generate-slugs {--force : Regenerate all slugs}';
    protected $description = 'Generate slugs for existing products';

    public function handle()
    {
        if ($this->option('force')) {
            $products = Product::all();
            $this->info("Regenerating slugs for ALL {$products->count()} products");
        } else {
            // Use raw SQL to properly detect NULL values
            $products = Product::whereRaw('slug IS NULL OR slug = ""')->get();
            $this->info("Found {$products->count()} products without proper slugs");
        }

        if ($products->isEmpty()) {
            $this->warn('No products found. Use --force to regenerate all slugs.');
            return;
        }

        foreach ($products as $product) {
            $slug = Str::slug($product->name);

            // Ensure uniqueness
            $original = $slug;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $original . '-' . $i++;
            }

            $product->update(['slug' => $slug]);
            $this->line("Generated slug '{$slug}' for product: {$product->name}");
        }

        $this->info('Slug generation completed!');
    }
}
