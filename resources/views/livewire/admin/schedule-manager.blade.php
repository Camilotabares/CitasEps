<div x-data ="data()">
    <x-wire-card>

        <div class="mb-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold ">
                Gestor de Horarios
            </h1>

        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            Dia/Hora
                        </th>

                        @foreach ($days as $day)
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                {{ $day }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class=" divide-y divide-gray-200">
                    @foreach ($this->hourBlocks as $hourBlock)
                        @php
                        $hour = $hourBlock->format('H:i:s');
                        @endphp
                    
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <label>
                                
                                <input type="checkbox" class="h-4 w-4  text-blue-300 border-gray-300 focus:ring-blue-500 ">
                                <span class="font-bold ml-2">
                                    {{ $hour}}
                                </span>
                            </label>
                        </td>

                        @foreach ($days as $indexDay => $day )
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-2"  >
                                <label>
                                    <input type="checkbox" class="h-4 w-4  text-blue-300 border-gray-300 focus:ring-blue-500 ">
                                    <span class="ml-2 text-sm font-medium text-gray-700">
                                        todos
                                    </span>
                                </label>
                                    
                                @for( $i = 0; $i < $intervals; $i++)

                                @php
                                    $startTime =$hourBlock->copy()->addMinutes($i * $apointment_duration);
                                    $endtime = $startTime->copy()->addMinutes($apointment_duration);
                                @endphp
                                <label>
                                    <input type="checkbox" x-model="schedule['{{ $indexDay }}']['{{ $startTime->format('H:i:s') }}']" 
                                    class="h-4 w-4  text-blue-300 border-gray-300 focus:ring-blue-500 ">
                                    <span Class="ml-2 text-sm font-medium text-gray-700">
                                        {{ $startTime->format('H:i') }} -{{ $endtime->format('H:i') }}
                                    </span>
                                </label>
                                @endfor
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-wire-card>

    @push('js')
    <script>
        function data(){
            return{
                schedule:@entangle('schedule')
            }
        }
    </script>
    @endpush
</div>
