@extends('layouts.empresa')

@section('title', 'Desenvolvimento · ' . $empresa->nome)
@section('page-title', 'Jornada de Transformação')
@section('page-subtitle', 'SRC: ' . str_pad($empresa->id, 4, '0', STR_PAD_LEFT) . ' · CORP TRANSFORMATION PIPELINE v2.1')

@section('content')

<style>
@keyframes flow-dash {
    from { stroke-dashoffset: 60; }
    to   { stroke-dashoffset: 0; }
}
@keyframes pulse-node-indigo {
    0%,100% { box-shadow: 0 0 0 0 rgba(99,102,241,0); }
    50%      { box-shadow: 0 0 28px 6px rgba(99,102,241,0.45); }
}
@keyframes pulse-node-amber {
    0%,100% { box-shadow: 0 0 0 0 rgba(245,158,11,0); }
    50%      { box-shadow: 0 0 28px 6px rgba(245,158,11,0.45); }
}
@keyframes pulse-node-emerald {
    0%,100% { box-shadow: 0 0 0 0 rgba(16,185,129,0); }
    50%      { box-shadow: 0 0 28px 6px rgba(16,185,129,0.45); }
}
@keyframes scan-line {
    0%   { transform: translateY(-100%); opacity: 0; }
    10%  { opacity: 1; }
    90%  { opacity: 1; }
    100% { transform: translateY(400%); opacity: 0; }
}
.pipeline-line { animation: flow-dash 2s linear infinite; }
.node-pending   { animation: pulse-node-indigo 3s ease-in-out infinite; }
.node-progress  { animation: pulse-node-amber  2s ease-in-out infinite; }
.node-done      { animation: pulse-node-emerald 4s ease-in-out infinite; }
.scan { animation: scan-line 6s ease-in-out infinite; }
</style>

{{-- ── KPI Stats Row ─────────────────────────────────────────────────────── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
        $stats = [
            ['label' => 'Funcionários',   'val' => $empresa->funcionarios->count(),      'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z', 'color' => 'blue'],
            ['label' => 'Cursos Liberados','val' => $empresa->cursoAcessos->count(),     'icon' => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5', 'color' => 'violet'],
            ['label' => 'Progresso Geral', 'val' => $empresa->progressoGeral() . '%',   'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'color' => 'emerald'],
            ['label' => 'Status',          'val' => $empresa->status === 'active' ? 'Ativo' : ucfirst($empresa->status), 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => $empresa->status === 'active' ? 'emerald' : 'amber'],
        ];
    @endphp
    @foreach($stats as $s)
        <div class="bg-[#0d1526] border border-[#1a2844] rounded-2xl p-4 flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-{{ $s['color'] }}-500/10 border border-{{ $s['color'] }}-500/20 flex items-center justify-center shrink-0">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="text-{{ $s['color'] }}-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/>
                </svg>
            </div>
            <div>
                <p class="text-xl font-bold text-white">{{ $s['val'] }}</p>
                <p class="text-xs text-slate-500">{{ $s['label'] }}</p>
            </div>
        </div>
    @endforeach
</div>

{{-- ── Pipeline de Transformação ─────────────────────────────────────────── --}}
<div class="bg-[#0a0e1a] border border-[#1a2844] rounded-2xl overflow-hidden mb-6">

    {{-- Header do painel --}}
    <div class="px-6 py-4 border-b border-[#1a2844] flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></div>
            <span class="text-sm font-semibold text-white">Pipeline de Transformação Corporativa</span>
            <span class="px-2 py-0.5 text-[10px] font-mono text-blue-400/60 bg-blue-500/10 rounded">LIVE</span>
        </div>
        <span class="text-[10px] font-mono text-slate-600">{{ now()->format('Y-m-d H:i') }}</span>
    </div>

    {{-- Pipeline visualization --}}
    <div class="relative overflow-x-auto" id="pipeline-container">
        <div class="min-w-[800px] relative" id="pipeline-inner" style="padding: 3rem 4rem 2rem;">

            {{-- Scan line effect --}}
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <div class="scan absolute left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/30 to-transparent" style="top:0"></div>
            </div>

            {{-- SVG overlay (JS-populated) --}}
            <svg id="pipeline-svg" class="absolute inset-0 w-full h-full pointer-events-none" style="top:0;left:0"></svg>

            {{-- Main nodes row --}}
            <div class="relative z-10 flex justify-between" id="nodes-row">
                @foreach($pilares as $key => $pilar)
                    @php
                        $statusClass = match($pilar['status']) {
                            'completed'   => 'border-emerald-500/60 bg-emerald-500/10 node-done',
                            'in_progress' => 'border-amber-500/60 bg-amber-500/10 node-progress',
                            default       => 'border-indigo-500/30 bg-indigo-500/5 node-pending',
                        };
                        $iconColor = match($pilar['status']) {
                            'completed'   => '#34d399',
                            'in_progress' => '#fbbf24',
                            default       => '#818cf8',
                        };
                        $badgeColor = match($pilar['status']) {
                            'completed'   => 'bg-emerald-500/15 text-emerald-400 border-emerald-500/30',
                            'in_progress' => 'bg-amber-500/15 text-amber-400 border-amber-500/30',
                            default       => 'bg-slate-700/50 text-slate-500 border-slate-600/30',
                        };
                        $statusLabel = match($pilar['status']) {
                            'completed'   => 'Concluído',
                            'in_progress' => 'Em andamento',
                            default       => 'Pendente',
                        };
                    @endphp
                    <div class="flex flex-col items-center gap-3 w-44" data-pipeline-node="{{ $loop->index }}">

                        {{-- Node circle --}}
                        <a href="{{ route('empresa.diagnostico') }}#{{ $key }}"
                           class="relative w-20 h-20 rounded-full border-2 {{ $statusClass }} flex items-center justify-center transition-transform hover:scale-105 cursor-pointer">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="{{ $iconColor }}" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $pilar['icon'] }}"/>
                            </svg>
                            {{-- Sequence badge --}}
                            <div class="absolute -top-2 -right-2 w-5 h-5 rounded-full bg-[#0d1526] border border-[#1a2844] flex items-center justify-center text-[9px] font-mono text-slate-400">
                                0{{ $loop->iteration }}
                            </div>
                        </a>

                        {{-- Label --}}
                        <div class="text-center">
                            <p class="text-sm font-bold text-white">{{ $pilar['label'] }}</p>
                            <span class="inline-flex px-2 py-0.5 text-[10px] font-medium rounded border {{ $badgeColor }} mt-1">{{ $statusLabel }}</span>
                        </div>

                        {{-- Progress bar --}}
                        <div class="w-full">
                            <div class="flex justify-between text-[10px] text-slate-600 mb-1">
                                <span>Progresso</span><span>{{ $pilar['progresso'] }}%</span>
                            </div>
                            <div class="h-1 bg-slate-800 rounded-full overflow-hidden">
                                <div class="h-full rounded-full transition-all duration-1000
                                    {{ $pilar['status'] === 'completed' ? 'bg-emerald-500' : ($pilar['status'] === 'in_progress' ? 'bg-amber-500' : 'bg-indigo-600/40') }}"
                                     style="width:{{ $pilar['progresso'] }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Spacer for SVG drop lines --}}
            <div class="h-10"></div>

            {{-- Sub-nodes row --}}
            <div class="relative z-10 flex justify-between" id="sub-row">
                @foreach($pilares as $key => $pilar)
                    <div class="flex flex-col gap-2 w-44" data-sub-node="{{ $loop->index }}">
                        @foreach($pilar['sub'] as $sub)
                            <a href="{{ route('empresa.diagnostico') }}#{{ $key }}"
                               class="flex items-center gap-2 px-3 py-1.5 bg-[#0d1526] border border-[#1a2844] hover:border-blue-500/30 hover:bg-blue-500/5 rounded-lg text-[11px] text-slate-400 hover:text-slate-200 transition-all group cursor-pointer">
                                <div class="w-1 h-1 rounded-full bg-slate-600 group-hover:bg-blue-500 transition shrink-0"></div>
                                {{ $sub }}
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ── Quick Access Grid ─────────────────────────────────────────────────── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
    @php
        $quickAccess = [
            ['route' => 'empresa.treinamentos', 'label' => 'Treinamentos', 'desc' => 'Cursos liberados para equipe',
             'icon' => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',
             'count' => $empresa->cursoAcessos->count(), 'color' => 'violet'],
            ['route' => 'empresa.funcionarios', 'label' => 'Funcionários', 'desc' => 'Perfis da equipe',
             'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z',
             'count' => $empresa->funcionarios->count(), 'color' => 'blue'],
            ['route' => 'empresa.diagnostico',  'label' => 'Diagnóstico',  'desc' => 'Pontos de melhoria',
             'icon' => 'M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z',
             'count' => $empresa->pilares->count(), 'color' => 'amber'],
            ['route' => 'empresa.comunicacao',  'label' => 'Comunicação',  'desc' => 'Suporte direto',
             'icon' => 'M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z',
             'count' => null, 'color' => 'cyan'],
        ];
    @endphp
    @foreach($quickAccess as $qa)
        <a href="{{ route($qa['route']) }}"
           class="group bg-[#0d1526] border border-[#1a2844] hover:border-{{ $qa['color'] }}-500/30 rounded-2xl p-4 transition-all hover:bg-{{ $qa['color'] }}-500/5">
            <div class="flex items-start justify-between mb-3">
                <div class="w-9 h-9 rounded-xl bg-{{ $qa['color'] }}-500/10 border border-{{ $qa['color'] }}-500/20 flex items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="text-{{ $qa['color'] }}-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $qa['icon'] }}"/>
                    </svg>
                </div>
                @if($qa['count'] !== null)
                    <span class="text-xs font-bold text-{{ $qa['color'] }}-400">{{ $qa['count'] }}</span>
                @endif
            </div>
            <p class="text-sm font-semibold text-white group-hover:text-{{ $qa['color'] }}-300 transition">{{ $qa['label'] }}</p>
            <p class="text-xs text-slate-600 mt-0.5">{{ $qa['desc'] }}</p>
        </a>
    @endforeach
</div>

<script>
(function() {
    function drawPipeline() {
        const svg    = document.getElementById('pipeline-svg');
        const inner  = document.getElementById('pipeline-inner');
        if (!svg || !inner) return;

        const cRect  = inner.getBoundingClientRect();
        const W      = cRect.width;
        const H      = cRect.height;
        svg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
        svg.setAttribute('width',  W);
        svg.setAttribute('height', H);

        // Remove previous drawings
        while (svg.firstChild) svg.removeChild(svg.firstChild);

        const NS = 'http://www.w3.org/2000/svg';

        function mkLine(x1,y1,x2,y2,opts) {
            const l = document.createElementNS(NS,'line');
            l.setAttribute('x1',x1); l.setAttribute('y1',y1);
            l.setAttribute('x2',x2); l.setAttribute('y2',y2);
            l.setAttribute('stroke', opts.stroke || 'rgba(99,102,241,0.35)');
            l.setAttribute('stroke-width', opts.width || '1.5');
            l.setAttribute('stroke-dasharray', opts.dash || '10 6');
            if (opts.anim) l.setAttribute('class','pipeline-line');
            svg.appendChild(l);
        }

        function mkCircle(cx,cy,r,color) {
            const c = document.createElementNS(NS,'circle');
            c.setAttribute('cx',cx); c.setAttribute('cy',cy); c.setAttribute('r',r);
            c.setAttribute('fill',color);
            svg.appendChild(c);
        }

        const nodes   = inner.querySelectorAll('[data-pipeline-node]');
        const subs    = inner.querySelectorAll('[data-sub-node]');
        const nodePos = [];
        const subPos  = [];

        nodes.forEach(n => {
            const r = n.getBoundingClientRect();
            const circle = n.querySelector('a');
            const cr = circle ? circle.getBoundingClientRect() : r;
            nodePos.push({
                cx: cr.left + cr.width/2 - cRect.left,
                cy: cr.top  + cr.height/2 - cRect.top,
                bottom: cr.bottom - cRect.top,
            });
        });

        subs.forEach(s => {
            const r = s.getBoundingClientRect();
            subPos.push({
                cx:  r.left + r.width/2 - cRect.left,
                top: r.top - cRect.top,
            });
        });

        // Horizontal main pipeline
        if (nodePos.length >= 2) {
            const y = nodePos[0].cy;
            mkLine(nodePos[0].cx, y, nodePos[nodePos.length-1].cx, y,
                   {stroke:'rgba(99,102,241,0.25)', width:'2', dash:'12 6', anim:true});

            // Dots at each node junction on the line
            nodePos.forEach((np,i) => {
                if (i === 0 || i === nodePos.length-1) return;
                mkCircle(np.cx, y, 3, 'rgba(99,102,241,0.5)');
            });
        }

        // Vertical drops from each node to sub-row
        nodePos.forEach((np, i) => {
            if (!subPos[i]) return;
            const subTop = subPos[i].top;
            mkLine(np.cx, np.bottom, np.cx, subTop,
                   {stroke:'rgba(99,102,241,0.2)', width:'1.5', dash:'6 5'});
            mkCircle(np.cx, subTop, 2.5, 'rgba(99,102,241,0.4)');
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Small delay to ensure layout is painted
        setTimeout(drawPipeline, 80);
        window.addEventListener('resize', function() { setTimeout(drawPipeline, 50); });
    });
})();
</script>

@endsection
