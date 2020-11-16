<template>
	<div class="col-12 col-lg-6">
		<!-- <div v-if="message" class="alert-success">{{ message }}</div> -->
		<!-- <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div> -->
		<div>
			<!-- <div v-if="loaded"> -->
			<!-- <div class="row justify-content-center"> -->
			<div class="card mb-5" id="playerCard">
				<div class="card-header">
					<div class="row">
						<div class="col-6">
							<h6>{{pclive.gender}} {{race}}</h6>
							<h1 class="display-6">
								<input type="text" v-model="pclive.name" @change="update" class="w-100" />
							</h1>
						</div>
						<div class="col-2 text-center">
							<h6>AC</h6>
							<h1>
								<input type="text" v-model="pclive.ac" @change="update" class="w-100 text-center" />
							</h1>
						</div>
						<div class="col-2 text-center">
							<h6>HP</h6>
							<h1>
								<input type="text" v-model="pclive.livehp" @change="update" class="w-100 text-center" />
							</h1>
						</div>
						<div class="col-2 text-center">
							<h6>MAX HP</h6>
							<h1>
								<input
									type="text"
									v-model="pclive.hp"
									@change="update"
									class="w-100 text-center text-muted"
								/>
							</h1>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Str"
								name="upStr"
								@click="pclive.str++; update();"
							>+</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Dex"
								name="upDex"
								@click="pclive.dex++; update();"
							>+</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Con"
								name="upCon"
								@click="pclive.con++; update();"
							>+</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Wis"
								name="upWis"
								@click="pclive.wis++; update();"
							>+</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Int"
								name="upInt"
								@click="pclive.int++; update();"
							>+</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-primary btn-sm btn-block"
								id="Cha"
								name="upCha"
								@click="pclive.cha++; update();"
							>+</button>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-2">Str: {{ pclive.str }}</div>
						<div class="col-2">Dex: {{ pclive.dex }}</div>
						<div class="col-2">Con: {{ pclive.con }}</div>
						<div class="col-2">Wis: {{ pclive.wis }}</div>
						<div class="col-2">Int: {{ pclive.int }}</div>
						<div class="col-2">Cha: {{ pclive.cha }}</div>
					</div>
					<div class="row">
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Str"
								name="downStr"
								@click="pclive.str--; update();"
							>-</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Dex"
								name="downDex"
								@click="pclive.dex--; update();"
							>-</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Con"
								name="downCon"
								@click="pclive.con--; update();"
							>-</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Wis"
								name="downWis"
								@click="pclive.wis--; update();"
							>-</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Int"
								name="downInt"
								@click="pclive.int--; update();"
							>-</button>
						</div>
						<div class="col-2">
							<button
								class="btn btn-outline-danger btn-sm btn-block"
								id="Cha"
								name="downCha"
								@click="pclive.cha--; update();"
							>-</button>
						</div>
					</div>
				</div>
			</div>
			<!-- </div> -->
			<!-- </div> -->
		</div>
	</div>
</template>

<script>
import axios from "axios";
export default {
	props: ["pcdetails", "race"],
	data() {
		return {
            pclive: this.pcdetails,
        };
	},
	mounted() {
		console.log("Player " + this.pcdetails.name + " Componenet Loaded.");
		Echo.channel("player-tracker." + this.pcdetails.id).listen(
			"PlayerUpdated",
			pc => {
				console.log(pc);
                console.log(pc.name + " stats have been updated");
                this.pclive = pc;
			}
		);
	},
	methods: {
		update(val) {
			this.$emit(
				"update",
				this.pclive.id,
				this.pclive.name,
				this.pclive.gender,
				this.pclive.str,
				this.pclive.dex,
				this.pclive.con,
				this.pclive.wis,
				this.pclive.int,
				this.pclive.cha,
				this.pclive.livehp,
				this.pclive.hp,
				this.pclive.ac
			);
		}
	}
};
</script>
