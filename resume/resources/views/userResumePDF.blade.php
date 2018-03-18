<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <table cellpadding="2" border="1">
            <tr>
                <th>姓名</th>
                <td>{{ $user->lastname }}{{ $user->firstname }}</td>
                <th>性別</th>
                <td>{{ $user->sex == 0 ? '男性' : '女性' }}</td>
                <td rowspan="6"><img src="{{ url('/' . $user->photo) }}"></td>
            </tr>
            <tr>
                <th>生日</th>
                <td colspan="3">{{ $user->birthday }}</td>
            </tr>
            <tr>
                <th>地方</th>
                <td>{{ $user->location }}</td>
                <th>語言</th>
                <td>
                    @if($user->lang == 0)
                    English
                    @elseif($user->lang == 1)
                    繁體中文
                    @else
                    日本語
                    @endif
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td colspan="3">{{ $user->email }}</td>
            </tr>
            <tr>
                <th>連絡電話</th>
                <td colspan="3">{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>技能</th>
                <td colspan="3">{{ $user->skills }}</td>
            </tr>
            <tr>
                <th>自傳</th>
                <td colspan="4">{{ $user->bio }}</td>
            </tr>
            <tr>
                <th>工作經歷</th>
                <td colspan="4">
                    @foreach($user->experience as $exp)
                        <b>{{ $exp->company }}</b> ({{ $exp->from }} ～ {{ $exp->to }})<br>
                        <em>{{ $exp->position }}</em><br>
                        <p>{{ $exp->description }}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>教育背景</th>
                <td colspan="4">
                    @foreach($user->education as $edu)
                        <b>{{ $edu->school }}</b> ({{ $edu->from }} ～ {{ $edu->to }})<br>
                        <em>{{ $edu->department }}</em><br>
                        <p>{{ $edu->description }}</p>
                    @endforeach
                </td>
            </tr>
        </table>
    </body>
</html>