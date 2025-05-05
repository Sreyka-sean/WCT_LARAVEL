<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // List all features
    public function index()
    {
        $features = Feature::all(); // Fetch all features
        return view('Feature_views.index', compact('features')); // Pass features to the view
    }

    // Show create form
    public function create()
    {
        return view('Feature_views.Create'); // Return the create view
    }

    // Store new feature
    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        // Create a new feature
        Feature::create($data);

        // Redirect to the index page with a success message
        return redirect()->route('Feature_views.index')->with('success', 'Feature created successfully!');
    }

    // Show features on the frontend
    public function showFeatures()
    {
        $features = Feature::all(); // Fetch all features
        return view('pages.service', compact('features')); // Pass features to the service view
    }

    // Show edit form
    public function edit(Feature $feature)
    {
        return view('Feature_views.Edit', compact('feature')); // Pass the feature to the edit view
    }

    // Update feature
    public function update(Request $request, Feature $feature)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        // Update the feature
        $feature->update($data);

        // Redirect to the index page with a success message
        return redirect()->route('Feature_views.index')->with('success', 'Feature updated successfully!');
    }

    // Delete feature
    public function destroy(Feature $feature)
    {
        // Delete the feature
        $feature->delete();

        // Redirect to the index page with a success message
        return redirect()->route('Feature_views.index')->with('success', 'Feature deleted successfully!');
    }
}