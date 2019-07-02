{$js}

<h2>Типы телефонов <a href="/Phones/TypeEdit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/"><i class="fas fa-users"></i> Профили</a></p>

{if ($saved > 0)}
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
{/if}


<table class="phones-table table table-striped table-hover">
    <thead>
        <tr>
            <th>Название</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
        </tr>
    </thead>
    <tbody>
        {$phone_types->rewind()}
        {while $phone_types->valid() }
            {assign var="phone_type" value=$phone_types->current() }
            <tr>
                <td>{$phone_type->getName()}</td>
                <td class="text-center td-edit"><a href="/Phones/TypeEdit/?id={$phone_type->getId()}"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhoneType({$phone_type->getId()}, event);"><i class="fas fa-times"></i></a></td>
            </tr>
            {assign var="name1" value=$phone_types->next() }
        {/while}
    </tbody>
</table>