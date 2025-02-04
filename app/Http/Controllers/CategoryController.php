<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\pdf;
use Dompdf\Dompdf;
use Dompdf\Options;



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function printPdf()
    {
        $categories = Category::all();
        $pdf = PDF::loadView('categories_pdf', compact('categories'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('categories.pdf');
    }

    public function exportExcel()
    {
        $categories = Category::all();

        // Header file Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=categories.xls");

        echo "<table border='1'>";
        echo "<tr><th>#</th><th>Name</th><th>Description</th></tr>";

        foreach ($categories as $index => $category) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $category->name . "</td>";
            echo "<td>" . $category->description . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        exit;
    }

    public function exportPdf()
    {
        $categories = Category::all();

        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdf->setOptions($options);

        $html = view('categories.pdf', compact('categories'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('categories.pdf', ['Attachment' => true]);
    }

}
