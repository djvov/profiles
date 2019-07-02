{if $id == 0 }
    <h2>Добавление</h2>
{else}
    <h2>Редактирование</h2>
    {assign var="phone_type" value=$phone_types->current() }
{/if}

<form method="post" id="fmEdit" action="/Phones/TypeList">
    <input type="hidden" name="typeId" id="typeId" value="{$id}" >
    <div class="form-group">
        <label for="inpSurname">Название</label>
        <input type="text" class="form-control" name="typeName[{$id}]" id="inpTypeName" placeholder="Название" required="required" value="{if isset($phone_type)}{$phone_type->getName()}{/if}">
    </div>
    <div class="row buttons-edit">
        <div class="col-7 col-md-3 text-left text-md-left">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
        </div>
        <div class="col-5 col-md-3 text-right text-md-left">
            <a href="/Phones/TypeList" class="btn btn-secondary"><i class="fas fa-ban"></i> Назад</a>
        </div>
    </div>
</form>
<br>