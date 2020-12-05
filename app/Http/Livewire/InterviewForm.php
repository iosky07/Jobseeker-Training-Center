<?php


namespace App\Http\Livewire;


use App\Models\Interview;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class InterviewForm extends Component
{

    public $interview;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.tester_name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required|time',
                'interview.quota' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }else{
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.tester_name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required|time',
                'interview.quota' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }
        return $rules;
    }

    public function create()
    {
//        dd($this->interview);
//        dd($interview);
//        $a = Auth::user()->id;
//        $b = Auth::user()->name;

        $this->interview['tester_id']=Auth::user()->tester->id;
        $this->interview['tester_name']=Auth::user()->tester->name;
//        $interview['date']=$this->interview['date'];
//        $interview['time']=$this->interview['time'];

        Interview::create($this->interview);

        $this->reset('interview');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
    }

    public function update()
    {
        $this->resetErrorBag();
        $this->validate();

        Question::query()
            ->where('id', $this->dataId)
            ->update($this->interview);

        $this->emit('saved');
    }

    public function mount ()
    {
        $this->interview['date']='';
        $this->interview['time']='';
//        dd($interview['tester_id']=Auth::user()->tester->name);
        if (!!$this->dataId) {
            $interview = Interview::findOrFail($this->dataId);

            $this->data = [
                "tester_id" => $interview->tester_id,
                "tester_name" => $interview->tester_name,
                "date" => $interview->date,
                "time" => $interview->time,
                "quota" => $interview->quota,
                "media" => $interview->media,
                "info" => $interview->info,
            ];
        }
    }

    public function render()
    {
        return view('livewire.interview-form');
    }

}