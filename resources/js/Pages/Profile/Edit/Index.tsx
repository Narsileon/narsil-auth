import { FormResource } from "@narsil-forms/Types";
import { UserModel } from "@narsil-auth/Types";
import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import AppHead from "@narsil-ui/Components/App/AppHead";
import BackButton from "@narsil-ui/Components/Button/BackButton";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	user: FormResource<UserModel>;
}

const Index = ({ user }: Props) => {
	const { trans } = useTranslationsStore();

	const form = useForm({
		form: user.form,
		data: user.data,
	});

	return (
		<>
			<AppHead
				description={user.form.title}
				keywords={user.form.title}
				title={user.form.title}
			/>
			<FormProvider {...form}>
				<Form
					method='patch'
					route={route("profile.update")}
				>
					<Fullscreen>
						<Section>
							<SectionHeader>
								<div className='flex items-center gap-x-2'>
									<BackButton
										asIcon={true}
										href={route("profile")}
										isDirty={form.formState.isDirty}
									/>
									<SectionTitle>{user.form.title}</SectionTitle>
								</div>

								<FullscreenToggle />
							</SectionHeader>
							<SectionContent>
								<FormRenderer nodes={user.form.nodes} />
							</SectionContent>
							<SectionFooter>
								<Button type='submit'>{trans("Save")}</Button>
							</SectionFooter>
						</Section>
					</Fullscreen>
				</Form>
			</FormProvider>
		</>
	);
};

export default Index;
