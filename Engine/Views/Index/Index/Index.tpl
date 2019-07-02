{$js}

<h2>Профили <a href="/Profiles/Edit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/Phones/TypeList"><i class="fas fa-phone-volume"></i> Типы телефонов</a></p>

{if ($saved > 0)}
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
{/if}

{$profiles->rewind()}
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
        {while $profiles->valid() }
            {assign var="profile" value=$profiles->current() }
            {assign var="emails" value=$profile->getEmails() }
            {assign var="phones" value=$profile->getPhones() }
            <tr>
                <td class="td-fio">{$profile->getSurname()}</td>
                <td class="td-fio">{$profile->getName()}</td>
                <td class="td-fio">{$profile->getPatronymic()}</td>
                <td class="td-mail">
                    {foreach from=$emails item=email}
                        {if $email->getMain() == 1}<b>{/if}<a href="mailto:{$email->getEmail()}">{$email->getEmail()}</a>{if $email->getMain() == 1}</b>{/if} <br>
                    {/foreach}
                </td>
                <td class="td-phone">
                    {foreach from=$phones item=phone}
                        <div class="row {if $phone->getMain() == 1}main-phone{/if}">
                            <div class="col-7"><a href="tel:{$phone->getPhone()}">{$phone->getPhone()}</a></div>
                            <div class="col-5 text-right">{$phone->getPhoneTypeName()}</div>
                        </div>
                    {/foreach}
                </td>
                <td class="text-center td-edit"><a href="/Profiles/Edit/?id={$profile->getId()}"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить профиль?')) deleteProfile({$profile->getId()}, event);"><i class="fas fa-times"></i></a></td>
            </tr>
                {assign var="name1" value=$profiles->next() }
        {/while}
    </tbody>
</table>

