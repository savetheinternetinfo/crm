<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    private $data;
    private $tag;
    private $keyword;
    public function search(Request $request) {
        if($request->ajax()) {
            $this->data = $request->input('search');
            $this->getTagAndKeyword();
            if($this->tag == null)
                return json_encode(null);
            else {
                $output = '';
                foreach (Note::where('title', 'LIKE', "%{$this->keyword}%")->withAnyTags($this->tag)->get() as $item) {
                    if(strlen($item->content) >= 30)
                        $item->content = substr($item->content, 0, 30).'...';

                    $output.='<tr>'.
                        '<td>'.$item->id.'</td>'.
                        '<td><a href="'.route('show', ['id' => $item->id]).'">'.$item->title.'</a></td>'.
                        '<td>'.$item->content.'</td>'.
                        '<td>'.$item->created_at.'</td>'.
                        '</tr>';
                }
                return Response($output);
            }

        }
    }


    private function getTagAndKeyword() {
        if($this->data[0] === ':') {
            preg_match("/:(.*):(.*)$/", $this->data, $src);
            if(is_null($src[1])) {
                $this->tag = null;
                $this->keyword = null;
            }
            else {
                $this->tag = explode(',', $src[1]);
                $this->keyword = str_replace(' ', '', $src[2]);
            }
        }
    }
}
