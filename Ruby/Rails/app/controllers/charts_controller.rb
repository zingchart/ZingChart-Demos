class ChartsController < ApplicationController

	def index
		@charts = Chart.all
		@sorted_charts = @charts.sort_by &:created_at
		@sorted_charts.reverse!
	end

	def show
		@chart = Chart.find(params[:id])
	end

	def new
		@chart = Chart.new
	end

	def edit
		@chart = Chart.find(params[:id])
	end

	def create
		@chart = Chart.new(chart_params)

		if @chart.save
			redirect_to @chart
		else
			render 'new'
		end
	end

	def update
		@chart = Chart.find(params[:id])

		if @chart.update(chart_params)
			redirect_to @chart
		else
			render 'edit'
		end
	end

	def destroy
		@chart = Chart.find(params[:id])
		@chart.destroy

		redirect_to charts_path
	end

	private
	def chart_params
		params.require(:chart).permit(:name, :json)
	end

end
