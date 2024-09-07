import { FormModel } from "@narsil-forms/Types";
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
	form: FormModel;
	token: string;
}

const Index = ({ form, token }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
		data: {
			token: token,
		},
	});

	return (
		<>
			<AppHead
				description={form.title}
				keywords={form.title}
				title={form.title}
			/>
			<FormProvider {...reactForm}>
				<Form route={route("password.update")}>
					<Fullscreen>
						<Section>
							<SectionHeader>
								<SectionTitle>{form.title}</SectionTitle>
								<FullscreenToggle />
							</SectionHeader>
							<SectionContent>
								<FormRenderer nodes={form.nodes} />
							</SectionContent>
							<SectionFooter>
								<Button type='submit'>{trans("Confirm")}</Button>
								<BackButton href={route("login")} />
							</SectionFooter>
						</Section>
					</Fullscreen>
				</Form>
			</FormProvider>
		</>
	);
};

export default Index;
