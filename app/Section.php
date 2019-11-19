<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];




    public function parent()
    {
        if ($this->parent_id == -1)
            return null;
        else
            return $this->belongsTo('App\Section', 'parent_id')->get()[0];
    }

    public static function generateLevel($tree)
    {

    }

    public static function tree()
    {
        $items = Section::all();
        $tree = [];



        foreach ($items as $row) {
            $pid  = $row->parent_id;
            $id   = $row->id;
            $name = $row->name;

            // Create or add child information to the parent node
            if (isset($tree[$pid]))
                // a node for the parent exists
                // add another child id to this parent
                $tree[$pid]["children"][] = $id;
            else
                // create the first child to this parent
                $tree[$pid] = array("children" => array($id));

            // Create or add name information for current node
            if (isset($tree[$id]))
                // a node for the id exists:
                // set the name of current node
                $tree[$id]["name"] = $name;
            else
                // create the current node and give it a name
                $tree[$id] = array("name" => $name);
        }



        return $tree;
    }

    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function children()
    {
        return $this->hasMany('App\Section', 'parent_id');
    }

    public function hasParent()
    {
        if ($this->parent_id == -1)
            return false;

        else

            return true;
    }
}
