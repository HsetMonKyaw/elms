$(document).ready(function()
{
    console.log('in script')
    $(document).on('click','.btn_delete',function(event){
        event.preventDefault()
        let status=confirm("Are you sure to delete?");
        console.log(status)
           
        if(status)
        {
            let id=$(this).parent().attr('id')
            // console.log("id is "+id)
            $.ajax({
                method:'post',
                url:'delete_category.php',
                data:{id:id},
                success:function(response){
                    // alert(response)
                    if(response=='success')
                    {
                        alert("Successfully delete")
                        location.href='category.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }
            })
        }
    })

    $(document).on('click','.btn1_delete',function(event){
        event.preventDefault()
        let status=confirm("Are you sure to delete instructor?");
        console.log(status)
        if(status)
        {
            let id=$(this).parent().attr('id')
            // console.log("id is "+id)
            $.ajax({
                method:'post',
                url:'delete_instructor.php',
                data:{id:id},
                success:function(response){
                    // alert(response)
                    if(response=='success')
                    {
                        alert("Successfully delete")
                        location.href='instructor.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }
            })
        }
    })

    $(document).on('click','.btn2_delete',function(event){
        event.preventDefault()
        let status=confirm("Are you sure to delete course?");
        console.log(status)
        if(status)
        {
            let id=$(this).parent().attr('id')
            // console.log("id is "+id)
            $.ajax({
                method:'post',
                url:'delete_course.php',
                data:{id:id},
                success:function(response){
                    // alert(response)
                    if(response=='success')
                    {
                        alert("Successfully delete")
                        location.href='course.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }
            })
        }
    })

    $(document).on('click','.btn3_delete',function(event)
    {
        event.preventDefault()
        let status=confirm("Are you sure to delete trainee?");
        console.log(status)
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method:'post',
                url:'delete_trainee.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        alert("Successfully delete")
                        location.href='trainee.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }

            })

        }

    })

    $(document).on('click','.btn4_delete',function(event)
    {
        event.preventDefault()
        let status=confirm("Are you sure to delete batch?");
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method:'post',
                url:'delete_batch.php',
                data:{id:id},
                success:function(response){
                    console.log(response)
                    if(response)
                    {
                        alert("Successfully delete")
                        location.href='batch.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }

            })

        }

    })

    $(document).on('click','.btn5_delete',function(event)
    {
        event.preventDefault()
        let status=confirm("Are you sure to project?");
        if(status)
        {
            let id=$(this).parent().attr('id')
            console.log(id)
            $.ajax({
                method:'post',
                url:'delete_project.php',
                data:{id:id},
                success:function(response){
                    if(response=="success")
                    {
                        alert("Successfully delete")
                        location.href='project.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }

            })

        }

    })
    
    $('#mytable').DataTable();
    
    $.ajax({
        url:'report_chart.php',
        method:'post',
        success:function(response)
        {
            let batch=JSON.parse(response)
            // console.log(batch);
            let year=[];
            let data=[];
            for(let index=0;index<batch.length;index++)
            {
                year[index]=batch[index].year;
                data[index]=batch[index].total;
            }
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
                    //x coordinate
					labels: year ,
                    // ["2017", "2018", "2019", "2020", "2022", "2023"],
					datasets: [{
						label: "Batches",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: data
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 2
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
        },
        error:function(message)
        {

        }
    })

    $(document).on('click','.btn_add',function(event){
        event.preventDefault();
        console.log("btn click")
        let id=$(this).parent().attr('id')
        console.log(id)
        $.ajax({
            url:'get_trainee.php',
            method:'post',
            data:{id:id},
            success:function(response){
                $('.rows').append(response)
            },
            error:function(message)
            {

            }
        
        })

     })


});