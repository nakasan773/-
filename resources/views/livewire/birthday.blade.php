<div class="d-inline">
    
    
    <!--<input type="text" name="age" class="form-control-sm col-sm-8 ml-5 d-inline float-right">-->

    <div class="form-control-sm col-sm-2 float-left" name="age">
        @if($age > -1)
        
        <input name="age" type="hidden" value="{{ $age }}">
        
            &nbsp;/&nbsp;{{ $age }}歳
        @endif
    </div>

    <!-- 年 -->
    <select class="form-control-sm col-sm-2 ml-3 d-inline float-left" name="birth-year" wire:model="year" wire:change="onChange">
        <option></option>
        @for($i = 1900 ; $i <= date('Y') ; $i++)
        <option value="{{ $i }}">{{ $i }}年</option>
        @endfor
    </select>
    
    <!-- 月 -->
    <select class="form-control-sm col-sm-2 ml-2 float-left" name="birth-month" wire:model="month" wire:change="onChange">
        <option></option>
        @for($i = 1 ; $i <= 12 ; $i++)
        <option value="{{ $i }}">{{ $i }}月</option>
        @endfor
    </select>
    
    <!-- 日 -->
    <select class="form-control-sm col-sm-2 ml-2 mr-5 float-left" name="birth-day" wire:model="day" wire:change="onChange">
        <option></option>
        @for($i = 1 ; $i <= $last_day_of_month ; $i++)
        <option value="{{ $i }}">{{ $i }}日</option>
        @endfor
    </select>
    
    <!-- 年齢 -->
    

</div>