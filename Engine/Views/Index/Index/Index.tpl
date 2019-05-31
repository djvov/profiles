{$js}

<h2>Профили <a href="/Profiles/Edit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/Phones/TypeList"><i class="fas fa-phone-volume"></i> Типы телефонов</a></p>

{if ($saved > 0)}
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
{/if}

<table class="profiles-table table table-striped table-hover">
    <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>E-mail</th>
            <th>Телефон</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$profiles item=profile}
            <tr>
                <td class="td-fio">{$profile['surname']}</td>
                <td class="td-fio">{$profile['name']}</td>
                <td class="td-fio">{$profile['patronymic']}</td>
                <td class="td-mail">
                    {foreach from=$profile['emails'] item=email}
                        {if $email['main']==1}<b>{/if}<a href="mailto:{$email['email']}">{$email['email']}</a>{if $email['main']==1}</b>{/if} <br>
                    {/foreach}
                </td>
                <td class="td-phone">
                    {foreach from=$profile['phones'] item=phone}
                        <div class="row {if $phone['main']==1}main-phone{/if}">
                            <div class="col-7"><a href="tel:{$phone['phone']}">{$phone['phone']}</a></div>
                            <div class="col-5 text-right">{$phone['phone_type']['name']}</div>
                        </div>
                    {/foreach}
                </td>
                <td class="text-center td-edit"><a href="/Profiles/Edit/?id={$profile['id']}"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить профиль?')) deleteProfile({$profile['id']}, event);"><i class="fas fa-times"></i></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>