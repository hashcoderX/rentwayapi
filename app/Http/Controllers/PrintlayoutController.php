<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Printlayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintlayoutController extends Controller
{
    public function setPrintLayout(Request $request)
    {
        $companyId = Auth::user()->company_id;

        // Retrieve input values
        $pagewidth = $request->pagewidth;
        $pageheight = $request->pageheight;

        // Check if a layout already exists for the company
        $avlayout = Printlayout::where('companyid', $companyId)->first();

        if ($avlayout) {
            // Update existing layout
            $avlayout->pagewidth = $pagewidth;
            $avlayout->pageheight = $pageheight;
            $avlayout->save();
        } else {
            // Create a new layout
            $layout = new Printlayout();
            $layout->companyid = $companyId;
            $layout->pagewidth = $pagewidth;
            $layout->pageheight = $pageheight;
            $layout->save();
        }

        return response()->json(['success' => true, 'message' => 'Print layout updated successfully']);
    }

    public function uploadAgreementpage(Request $request)
    {
        $companyId = Auth::user()->company_id;

        // Define the upload path
        $uploadPath = "companylogo/";
        $layoutsize = $request->printing;
        $pagenumber = $request->pagenumber;

        // Define layout dimensions based on layout size
        $dimensions = [
            'letter' => ['width' => 215.9, 'height' => 279.4],
            'legal' => ['width' => 215.9, 'height' => 355.6],
            'tabloid' => ['width' => 279.4, 'height' => 431.8],
            'a4' => ['width' => 210, 'height' => 297],
            'a6' => ['width' => 105, 'height' => 148],
            'a5' => ['width' => 148, 'height' => 210],
            'a3' => ['width' => 297, 'height' => 420],
            'b5' => ['width' => 176, 'height' => 250],
            'b4' => ['width' => 250, 'height' => 353],
            'b3' => ['width' => 353, 'height' => 500],
            'c4' => ['width' => 229, 'height' => 324],
            'cs' => ['width' => 216, 'height' => 279], // Closest to Letter size
        ];

        // Set default dimensions
        $width = $dimensions[$layoutsize]['width'] ?? 0;
        $height = $dimensions[$layoutsize]['height'] ?? 0;
        $dpi = ($width > 0 && $height > 0) ? 300 : 0;
        $unit = 'mm';

        $layoutsize = Printlayout::where('companyid', $companyId)->first();
        if ($layoutsize) {
            $layoutsize->pagewidth = $width;
            $layoutsize->pageheight = $height;
            $layoutsize->save();
        } else {
            $layoutsize1 = new Printlayout();
            $layoutsize1->companyid = $companyId;
            $layoutsize1->pagewidth = $width;
            $layoutsize1->pageheight = $height;
            $layoutsize1->save();
        }

        // File upload logic

        if ($request->hasFile('agreementfile')) {
            $file = $request->file('agreementfile');
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();

            // Compress and store image
            $compressedImage = $this->compressImage($file->getRealPath(), public_path($imageUploadPath), 75);
            if (!$compressedImage) {
                return redirect()->back()->with('error', 'Image compression failed. Please try again.');
            }

            // Save to database
            $agreement = new Agreement();
            $agreement->agreement_image = $imageUploadPath;
            $agreement->companyid = $companyId;
            $agreement->layoutname = $layoutsize;
            $agreement->p_width = $width;
            $agreement->p_height = $height;
            $agreement->resulution = $dpi;
            $agreement->page_number = $pagenumber;
            $agreement->save();

            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }else{
            
        }

        // return response()->json([
        //     'status' => 200,
        //     'message' => 'Agreement uploaded successfully.',
        // ]);
    }

    function compressImage($source, $destination, $quality)
    {
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                return false; // Unsupported image type
        }

        if (imagejpeg($image, $destination, $quality)) {
            imagedestroy($image);
            return $destination;
        }

        imagedestroy($image);
        return false;
    }

    function convert_filesize($bytes, $decimals = 2)
    {
        $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $sizes[$factor];
    }


    function arrangement(Request $request)
    {
        $documentId = $request->id;
        $documentFile = Agreement::where('id', $documentId)->first();

        return view('setting.arrangment', compact('documentFile'));
    }
}
